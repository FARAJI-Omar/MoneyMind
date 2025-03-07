<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class AIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('GEMINI_API_KEY');  // Ensure this is set in your .env file
    }

    public function getFinancialAdvice($salary, $totalAllExpenses)
    {
        // Customize the prompt with the salary and expenses
        $prompt = "A user earns $salary DH per month and has total expenses of $totalAllExpenses DH.
                   Give them personalized financial advice based on their expenses to better manage their budget in 1-2 small sentences, easy english, if user have no current expenses, just say 'Welcome to MoneyMind! I'm here to help you manage your budget.'";

        Log::info('Gemini API Prompt:', ['prompt' => $prompt]);

        try {
            // Prepare the data for the POST request
            $data = [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => "$prompt"]
                        ]
                    ]
                ]
            ];

            // Make the POST request to Gemini API
            $response = $this->client->post(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $this->apiKey,
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $data,  // Send the JSON data
                ]
            );

            // Log the full response for debugging
            $responseData = json_decode($response->getBody(), true);
            Log::info('Gemini API Response:', $responseData);  // Log the raw response

            // Check if the response contains the expected result
            if (isset($responseData['candidates']) && !empty($responseData['candidates'])) {
                return $responseData['candidates'][0]['content']['parts'][0]['text'] ?? 'No available advice.';
            } else {
                Log::warning('Gemini API: Unexpected response format', $responseData);
                return 'No available advice.';
            }
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error("Erreur API Gemini : " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            return "Unable to get financial advice at the moment.";
        }
    }
}
