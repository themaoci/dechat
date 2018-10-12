<?php 
  function ckcrypt($mprhase,$Mkey) {
    $td = mcrypt_module_open('rijndael-256', '', 'ecb', '');
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td, $Mkey, $iv);
    $crypted_value = mcrypt_generic($td, $mprhase);
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    return base64_encode($crypted_value);
  }
?>
