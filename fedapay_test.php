<?php
require 'vendor/autoload.php';

\FedaPay\FedaPay::setApiKey('sk_sandbox_r7edoqFqJiSKu1Lk2t7LKP25');
\FedaPay\FedaPay::setEnvironment('sandbox');

try {
    $accounts = \FedaPay\Account::all();
    print_r($accounts);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
