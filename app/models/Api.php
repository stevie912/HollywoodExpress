<?php

class Api {

    public function __construct() {

    }

    public function getmovie($title) {
        $url = "http://www.omdbapi.com/?apikey=" . $_ENV['omdb_key'] . "&t=" . urlencode($title);
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        if ($data['Response'] == 'False') {
            $_SESSION['no_movie'] = true;
            header("Location: /home");
        } else {
            $_SESSION['movie'] = (array)$data;
            header("Location: /search/result");
        }
    }

    public function recommend($title1, $title2, $title3) {
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $_ENV['gemini_key'];
        $data = array(
            'contents' => array(
                array(
                    'parts' => array(
                        array(
                            'text' => "recommend a movie that is a similar style to the movies: " . $title1 . ", " . $title2 . ", " . $title3 . ", ignoring any null titles. Return the title only with no other text"
                        )
                    )
                )
            )
        );
        $json_data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        if(curl_errno($ch)) {
            echo 'Curl error:' . curl_error($ch);
        }
        $_SESSION['recommendation'] = json_decode($response, true);
    }

    public function review($title) {
        // echo "In review method for movie: " . $title;
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $_ENV['gemini_key'];
        $data = array(
            'contents' => array(
                array(
                    'parts' => array(
                        array(
                            'text' => "write a movie review for the movie " . $title
                        )
                    )
                )
            )
        );
        $json_data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        if(curl_errno($ch)) {
            echo 'Curl error:' . curl_error($ch);
        }
        // echo "Made it past curl";
        $_SESSION['review'] = json_decode($response, true);
        // $_SESSION['review'] = "This is a review for the movie " . $title;


    }

}