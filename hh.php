<?php
declare(strict_types = 1);
header ( "content-type: text/plain;charset=utf8" );
require_once ('hhb_.inc.php');
const DEATHBYCATPCHA_USERNAME = 'cmalaxman01';
const DEATHBYCAPTCHA_PASSWORD = 'Abcd@123';
$hc = new hhb_curl ( '', true );
$hc->setopt(CURLOPT_TIMEOUT,20);// im on a really slow net atm :(
$html = $hc->exec ( 'http://www.mca.gov.in/mcafoportal/login.do' )->getResponseBody (); // cookie session etc
$domd = @DOMDocument::loadHTML ( $html );
$inputs = getDOMDocumentFormInputs ( $domd, true ) ['login'];
$params = [ ];
foreach ( $inputs as $tmp ) {
    $params [$tmp->getAttribute ( "name" )] = $tmp->getAttribute ( "value" );
}
assert ( isset ( $params ['userNamedenc'] ), 'username input not found??' );
assert ( isset ( $params ['passwordenc'] ), 'passwordenc input not found??' );
$params ['userName'] = ''; // defaults to "Enter Username", cleared with javascript
unset ( $params ['dscBasedLoginFlag'] ); // removed with javascript
$params ['Cert'] = ''; // cleared to emptystring with javascript
unset ( $params ['newUserRegistration'] ); // removed with javascript
unset ( $params ['SelectCert'] ); // removed with javascript
$params ['userNamedenc'] = 'hGJfsdnk`1t';
$params ['passwordenc'] = '675894242fa9c66939d9fcf4d5c39d1830f4ddb9';
echo 'parsed login parameters: ';
var_dump ( $params );
$captchaRaw = $hc->exec ( 'http://www.mca.gov.in/mcafoportal/getCapchaImage.do' )->getResponseBody ();
$params ['userEnteredCaptcha'] = solve_captcha2 ( $captchaRaw );
// now actually logging in.
$html = $hc->setopt_array ( array (
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query ( $params ) 
) )->exec ( 'http://www.mca.gov.in/mcafoportal/loginValidateUser.do' )->getResponseBody ();
var_dump ( $hc->getStdErr (), $hc->getStdOut () ); // printing debug data
$domd = @DOMDocument::loadHTML ( $html );
$xp = new DOMXPath ( $domd );
$loginErrors = $xp->query ( '//ul[@class="errorMessage"]' );
if ($loginErrors->length > 0) {
    echo 'encountered following error(s) logging in: ';
    foreach ( $loginErrors as $err ) {
        echo $err->textContent, PHP_EOL;
    }
    die ();
}
echo "logged in successfully!";
/**
 * solves the captcha manually, by doing: echo ANSWER>captcha.txt
 *
 * @param string $raw_image
 *          raw image bytes
 * @return string answer
 */
function solve_captcha2(string $raw_image): string {
    $imagepath = getcwd () . DIRECTORY_SEPARATOR . 'captcha.png';
    $answerpath = getcwd () . DIRECTORY_SEPARATOR . 'captcha.txt';
    @unlink ( $imagepath );
    @unlink ( 'captcha.txt' );
    file_put_contents ( $imagepath, $raw_image );
    echo 'the captcha is saved in ' . $imagepath . PHP_EOL;
    echo ' waiting for you to solve it by doing: echo ANSWER>' . $answerpath, PHP_EOL;
    while ( true ) {
        sleep ( 1 );
        if (file_exists ( $answerpath )) {
            $answer = trim ( file_get_contents ( $answerpath ) );
            echo 'solved: ' . $answer, PHP_EOL;
            return $answer;
        }
    }
}
function solve_captcha(string $raw_image): string {
    echo 'solving captcha, hang on, with DEATBYCAPTCHA this usually takes between 10 and 20 seconds.';
    {
        // unfortunately, CURLFile requires a filename, it wont accept a string, so make a file of it
        $tmpfileh = tmpfile ();
        fwrite ( $tmpfileh, $raw_image ); // TODO: error checking (incomplete write or whatever)
        $tmpfile = stream_get_meta_data ( $tmpfileh ) ['uri'];
    }
    $hc = new hhb_curl ( '', true );
    $hc->setopt_array ( array (
            CURLOPT_URL => 'http://api.dbcapi.me/api/captcha',
            CURLOPT_POSTFIELDS => array (
                    'username' => DEATHBYCATPCHA_USERNAME,
                    'password' => DEATHBYCAPTCHA_PASSWORD,
                    'captchafile' => new CURLFile ( $tmpfile, 'image/png', 'captcha.png' ) 
            ) 
    ) )->exec ();
    fclose ( $tmpfileh ); // when tmpfile() is fclosed(), its also implicitly deleted.
    $statusurl = $hc->getinfo ( CURLINFO_EFFECTIVE_URL ); // status url is given in a http 300x redirect, which hhb_curl auto-follows
    while ( true ) {
        // wait for captcha to be solved.
        sleep ( 10 );
        echo '.';
        $json = $hc->setopt_array ( array (
                CURLOPT_HTTPHEADER => array (
                        'Accept: application/json' 
                ),
                CURLOPT_HTTPGET => true 
        ) )->exec ()->getResponseBody ();
        $parsed = json_decode ( $json, false );
        if (! empty ( $parsed->captcha )) {
            echo 'captcha solved!: ' . $parsed->captcha, PHP_EOL;
            return $parsed->captcha;
        }
    }
}
function getDOMDocumentFormInputs(\DOMDocument $domd, bool $getOnlyFirstMatches = false): array {
    // :DOMNodeList?
    $forms = $domd->getElementsByTagName ( 'form' );
    $parsedForms = array ();
    $isDescendantOf = function (\DOMNode $decendant, \DOMNode $ele): bool {
        $parent = $decendant;
        while ( NULL !== ($parent = $parent->parentNode) ) {
            if ($parent === $ele) {
                return true;
            }
        }
        return false;
    };
    // i can't use array_merge on DOMNodeLists :(
    $merged = function () use (&$domd): array {
        $ret = array ();
        foreach ( $domd->getElementsByTagName ( "input" ) as $input ) {
            $ret [] = $input;
        }
        foreach ( $domd->getElementsByTagName ( "textarea" ) as $textarea ) {
            $ret [] = $textarea;
        }
        foreach ( $domd->getElementsByTagName ( "button" ) as $button ) {
            $ret [] = $button;
        }
        return $ret;
    };
    $merged = $merged ();
    foreach ( $forms as $form ) {
        $inputs = function () use (&$domd, &$form, &$isDescendantOf, &$merged): array {
            $ret = array ();
            foreach ( $merged as $input ) {
                // hhb_var_dump ( $input->getAttribute ( "name" ), $input->getAttribute ( "id" ) );
                if ($input->hasAttribute ( "disabled" )) {
                    // ignore disabled elements?
                    continue;
                }
                $name = $input->getAttribute ( "name" );
                if ($name === '') {
                    // echo "inputs with no name are ignored when submitted by mainstream browsers (presumably because of specs)... follow suite?", PHP_EOL;
                    continue;
                }
                if (! $isDescendantOf ( $input, $form ) && $form->getAttribute ( "id" ) !== '' && $input->getAttribute ( "form" ) !== $form->getAttribute ( "id" )) {
                    // echo "this input does not belong to this form.", PHP_EOL;
                    continue;
                }
                if (! array_key_exists ( $name, $ret )) {
                    $ret [$name] = array (
                            $input 
                    );
                } else {
                    $ret [$name] [] = $input;
                }
            }
            return $ret;
        };
        $inputs = $inputs (); // sorry about that, Eclipse gets unstable on IIFE syntax.
        $hasName = true;
        $name = $form->getAttribute ( "id" );
        if ($name === '') {
            $name = $form->getAttribute ( "name" );
            if ($name === '') {
                $hasName = false;
            }
        }
        if (! $hasName) {
            $parsedForms [] = array (
                    $inputs 
            );
        } else {
            if (! array_key_exists ( $name, $parsedForms )) {
                $parsedForms [$name] = array (
                        $inputs 
                );
            } else {
                $parsedForms [$name] [] = $tmp;
            }
        }
    }
    unset ( $form, $tmp, $hasName, $name, $i, $input );
    if ($getOnlyFirstMatches) {
        foreach ( $parsedForms as $key => $val ) {
            $parsedForms [$key] = $val [0];
        }
        unset ( $key, $val );
        foreach ( $parsedForms as $key1 => $val1 ) {
            foreach ( $val1 as $key2 => $val2 ) {
                $parsedForms [$key1] [$key2] = $val2 [0];
            }
        }
    }
    return $parsedForms;
}