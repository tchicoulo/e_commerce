
var hp = $.get( "http://hp-api.herokuapp.com/api/characters")

.then(function(data){


data.forEach(function(guy) {


$('.card-columns').append('<div class="card" style="width: 18rem;"><img class="card-img-top" src="'+(guy.image)+'" alt="Card image cap"><div class="card-body"><h5 class="card-title">'+(guy.name)+'</h5>');


});


});