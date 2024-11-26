fetch("https://pokeapi.co/api/v2/pokemon/charizard")
.then(Response => Response.json())
.then(data => console.log(data))
.catch(error => console.error(error))