### Dechat - encoded chat using some rijndael-256 methods ###

_* 1 day build_

* go through the code to understand how it works its rly not that hard

##### Description: #####

* Chat Name - name of the user u specify (also encrypted using "Crypt Key")
* Crypt Key - key on which message will be encrypted (usefull to decrypt message)
* Auth Code - password hardcoded in php index file ($_POST['auth'] == "c2hpbm92")
* and text - message Encrypted using "Crypt Key"
