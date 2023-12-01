# CodingBuddies Advent 2023
## General Info
The coding buddies publish some coding challenges across the advent time.
This repo contains my solutions to those challenges.

You can find the coding challenges here: https://www.codingbuddies.de/advent

## Setup
I will use [dde](http://github.com/whatwedo/dde) to start my development environment. 
That's basically a wrapper for `docker-compose`. 
You can also use `docker-compose` to build and run the container for this project.

From inside the container you can use the commands listed in the Makefile.
Simply run `make help` to see a list of available commands.

### Install the needed packages
To install everything you need, run `make install`. 
This will set up the container with all needed packages.
