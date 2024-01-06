<?php
// Example usage:
require "openai-class.php";

$apiKey = 'YOUR TOKEN';
$gpt = new GPT3($apiKey);

$prompt = 'What is 51092 + 12984 ?';

$options = [
'max_tokens' => 500, // Adjust if needed. 
'temperature' => 0.8, // Adjust if needed.
];

$response = $gpt->generateText($prompt, $options);
echo $response;
