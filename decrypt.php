<?php
  function ckdecrypt($mprhase,$Mkey) {
    $td = mcrypt_module_open('rijndael-256', '', 'ecb', '');
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td, $Mkey, $iv);
    $decrypted_value = mdecrypt_generic($td, base64_decode($mprhase));
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    return utf8_decode($decrypted_value);
  }
?>
