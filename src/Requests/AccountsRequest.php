<?php

namespace LaraLuke\Mapbox\Requests;

class AccountsRequest extends Request
{
    public function retrieveToken(string $token)
    {
        $response = $this->get('tokens/v2');

        switch ($response['code']) {
            case 'TokenValid':
                return [
                    'success' => true,
                    'message' => 'The token is valid and active.',
                ];

                break;

            case 'TokenMalformed':
                return [
                    'success' => false,
                    'message' => 'The token cannot be parsed.',
                ];

                break;

            case 'TokenInvalid':
                return [
                    'success' => false,
                    'message' => 'The signature for the token does not validate.',
                ];

                break;

            case 'TokenExpired':
                return [
                    'success' => false,
                    'message' => '	The token was temporary and has expired.',
                ];

                break;

            case 'TokenRevoked':
                return [
                    'success' => false,
                    'message' => 'The token\'s authorization has been deleted.',
                ];

                break;
            
            default:
                return [
                    'success' => false,
                    'message' => 'Unable to validate the token.',
                ];

                break;
        }
    }
}