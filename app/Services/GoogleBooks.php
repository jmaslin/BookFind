<?php namespace Bookfind\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class GoogleBooks {

    protected $client;

    protected $service;

    function __construct() {
        /* Get config variables */
        $client_id = Config::get('google.client_id');
        $service_account_name = Config::get('google.service_account_name');
        $key_file_location = base_path() . Config::get('google.key_file_location');

        $this->client = new \Google_Client();
        $this->client->setApplicationName("Bookfind");
        $this->service = new \Google_Service_Books($this->client);

        /* If we have an access token */
        if (Cache::has('service_token')) {
          $this->client->setAccessToken(Cache::get('service_token'));
        }

        $key = file_get_contents($key_file_location);
        /* Add the scopes you need */
        $scopes = array('https://www.googleapis.com/auth/books');
        $cred = new \Google_Auth_AssertionCredentials(
            $service_account_name,
            $scopes,
            $key
        );

        $this->client->setAssertionCredentials($cred);
        if ($this->client->getAuth()->isAccessTokenExpired()) {
          $this->client->getAuth()->refreshTokenWithAssertion($cred);
        }
        Cache::forever('service_token', $this->client->getAccessToken());
    }

    public function get($search, $opt_params)
    {
        $results = $this->service->volumes->listVolumes($search, $opt_params);
        
        foreach ($results as $item) {
            // echo $item['volumeInfo']['title'], "<br /> \n";
            // echo json_encode($item['volumeInfo'], JSON_PRETTY_PRINT);
        }

        return $results;

        // echo var_dump($results);
        // echo json_encode($results, JSON_PRETTY_PRINT);
        // dd($results);
        // return $results[0]['volumeInfo'];
    }
}