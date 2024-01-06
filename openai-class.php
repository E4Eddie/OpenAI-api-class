<?php
class GPT3 {

private $apiKey;
private $apiUrl = 'https://api.openai.com/v1/engines/text-davinci-003/completions';

public function __construct($apiKey) {
    $this->apiKey = $apiKey;
}

public function generateText($prompt, $options = []) {
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $this->apiKey,
    ];

    $data = [
        'prompt' => $prompt,
        'max_tokens' => isset($options['max_tokens']) ? $options['max_tokens'] : 150,
        'temperature' => isset($options['temperature']) ? $options['temperature'] : 0.7,
    ];

    $ch = curl_init($this->apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        die('Error: ' . curl_error($ch));
    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);

    if (isset($decodedResponse['choices'][0]['text'])) {
        return $decodedResponse['choices'][0]['text'];
    } elseif (isset($decodedResponse['error']['message'])) {
        return 'Error: ' . $decodedResponse['error']['message'];
    } else {
        return 'Error: Unable to retrieve response.';
    }
}
}

