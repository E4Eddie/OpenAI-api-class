
<h1 align="center">
  <br>
  Simpe openai class
  <br>
</h1>

<h4 align="center">Simple PHP OpenAI class using text-davinci-003</h4>

## Example usage


```php
require "openai-class.php" // Make sure you include/require it properly.
$apiKey = 'YOUR TOKEN';
$gpt = new GPT3($apiKey);

$prompt = 'What is 51092 + 12984 ?';

$options = [
'max_tokens' => 500, // Adjust if needed. 
'temperature' => 0.8, // Adjust if needed.
];

$response = $gpt->generateText($prompt, $options);
echo $response;
```


## License

MIT

---

> GitHub [@E4Eddie](https://github.com/E4Eddie) &nbsp;&middot;&nbsp;

