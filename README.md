### Jackpot! Game

### Objective

Jackpot! You've landed a summer gig in Las Vegas! Unfortunately, it's 2021, and the casinos are closed due to COVID-19. Your boss wants to move some of the business online and asks you to build a full-stack app — a simple slot machine game, with a little twist. Build it to ensure that the house always wins!

### Prerequisites

In order to be able to play Jackpot! please ensure you have the following installed:

-   PHP
-   composer
-   Node.js

### Getting Started

Clone the repository:

`git clone https://github.com/steph-morrissey/jackpot-game.githttps://github.com/steph-morrissey/jackpot-game.git`

To setup your local development environment and begin playing the game open a terninal in your preferred console and ensure that you are in the root of the jackpot-game directory.

Install all relevant dependencies by running the following command:

`composer install ` and
`npm install`

Create a .env file within the root of the directory and copy the contents of .env.example file into it and save

Now generate an application key by running the command:

`php artisan key:generate`

Then to start the server locally run:

`php artisan serve`

Click the link proviced within the terminal to be directed to the Jackpot! Game

### Checklist

-   [x] Create HTML view
-   [x] Create GET game/session route
-   [x] Add game logic
-   [x] Implement spin logic and update session key/pair values accordingly
-   [x] Create POST game/session route and Spin Me button functionality
-   [x] Create POST game/session/end route and Cash Out button functionality
-   [] Add random movement functionality to button based off chance factor
-   [] Add spinning state on spin request
-   [] Create LootOption table
-   [] Create User table
-   [] Update README.md and incorporate back end instructions
-   [] Add tests for business logic

---

### Brief

When a player starts a game/session, they are allocated 10 credits.
Pulling the machine lever (rolling the slots) costs 1 credit.
The game screen has 1 row with 3 blocks.
For players to win the roll, they have to get the same symbol in each block.
There are 4 possible symbols: cherry (10 credits reward), lemon (20 credits reward), orange (30 credits reward), and watermelon (40 credits reward).
The game (session) state has to be kept on the server.
If the player keeps winning, they can play forever, but the house has something to say about that...
There is a CASH OUT button on the screen, but there's a twist there as well.

### Tasks

-   Implement assignment using:
    -   Language: _PHP_
    -   Framework: _Laravel_
-   When a user opens the app, a session is created on the server, and they have 10 starting credits.
-   **Server-side:**

    -   When a user has less than 40 credits in the game session, their rolls are truly random.
    -   If a user has between 40 and 60 credits, then the server begins to slightly cheat:
        -   For each winning roll, before communicating back to the client, the server does one 30% chance roll which decides if the server will re-roll that round.
        -   If that roll is true, then the server re-rolls and communicates the new result back.
    -   If the user has above 60 credits, the server acts the same, but in this case the chance of re-rolling the round increases to 60%.
        -   If that roll is true, then the server re-rolls and communicates the new result back.
    -   There is a cash-out endpoint that moves credits from the game session to the user's account and closes the session.

-   **Client side:**
    -   Include a super simple, minimalistic table with 3 blocks in 1 row.
    -   Include a button next to the table that starts the game.
    -   The components for each sign can be a starting letter (C for cherry, L for lemon, O for orange, W for watermelon).
    -   After submitting a roll request to the server, all blocks should enter a spinning state (can be the character 'X' spinning).
    -   After receiving a response from the server, the first sign should spin for 1 second more and then display the result, then display the second sign at 2 seconds, then the third sign at 3 seconds.
    -   If the user wins the round, their session credit is increased by the amount from the server response, else it is deducted by 1.
    -   Include a button on the screen that says "CASH OUT", but when the user hovers it, there is a 50% chance that the button moves in a random direction by 300px, and a 40% chance that it becomes unclickable (this roll should be done on the client-side). If they succeed to hit it, credits from the session are moved to their account.
-   Write tests for your business logic
