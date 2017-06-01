var app = angular.module('app', []);

app.controller('MainCtrl', ['$http', function ($http) {
    var self = this;

    self.getPublicKey = function() {
        $http.get('src/php/get_publickey.php').then(function(result) {
            self.publickey = result.data.publickey;
        })
    };
    self.getPublicKey();

    self.encryptMessage = function() {
        $http.post('src/php/encrypt_message.php', {msg: self.message}).then(function(result) {
            self.encryptedMessage = result.data.encrypted_message;
        })
    };

    self.decryptMessage = function() {
        $http.post('src/php/decrypt_message.php', {msg: self.encryptedMessage}).then(function(result) {
            self.decryptedMessage = result.data.decrypted_message;
        })
    };
}]);
