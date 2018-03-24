**Pokemons Movement**

Small php app to show how many pokemons the user can catch by inserting coordinates as input to the command.
The user will start with one pokemon for the starting position. Will always catch a new one on each new position that he
visits. If the same position is visited, no pokemon is going to be catched.

There are 4 possible movements:
- N
- S
- E
- W/O

On each new movement, a pokemon will be fetched if it's the first time the user is on that position.

To run it, just run the app file passing the movements as input.
Example:
php app.php NESO

To run the tests, install phpunit via composer
