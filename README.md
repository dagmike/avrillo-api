# Kanye Rest API (Avrillo Test)

## Starting the application
This application uses Laravel Sail in order to run. Under the hood this uses docker therefore docker must be installed in order to proceed.

1. Clone this git repo (or unzip the application)
2. Run the command ```sail up```

Application should be running on http://localhost

## Authentication
You may set the API token for use in the application in the .env file. Note if you intend to change this from what is currently there then you will have to clear the env cache.

I have chosen to only use a static API token (singular) given the scope of the task. If indeed there was a need for multiple API keys then I would have used the database to store them and included an endpoint in order to generate user specific API tokens.

Authorization is made using a a Bearer Token. This means sending a header with each request of:

```Authorization: Bearer myexampleapitokenforapi```

## Endpoint
There are 2 endpoints to the application, one to retrieve 5 quotes from the API and one to refresh those quotes and return a new set of quotes.

- GET /api/kanye/quotes (retrieves 5 quotes)
- GET /api/kanye/refresh (refreshes and retrieves another 5 quotes)

The results are cached for a standard of 300 seconds (5 minutes) this can again be set in the .env file so it is customizable. If it is not present in the .env file then it will remember the 5 quotes until the refresh endpoint is hit.