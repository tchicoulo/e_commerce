
var hp = $.get( "http://hp-api.herokuapp.com/api/characters")

.then(function(data){


data.forEach(function(guy) {


$('.container').append('<div class="card" style="width: 18rem;"><img class="card-img-top" src="'+(guy.image)+'" alt="Card image cap"><div class="card-body"><h5 class="card-title">Name : '+(guy.name)+'</h5><p class="card-text">Species : '
	+(guy.species)+
'<br>Gender : '+(guy.gender)+
'<br>House : '+guy.house+
'<br>Date of Birth : '+guy.dateOfBirth+
'<br>Year : '+guy.yearOfBirth+
'<br> Ancestry: '+guy.ancestry+
'<br> Eye Colour: '+guy.eyeColour+
'<br> Hair Colour: '+guy.hairColour+
'<br> Wand Wood: '+guy.wand.wood+
'<br> Wand Core: '+guy.wand.core+
'<br> Wand Length: '+guy.wand.length+
'<br> patronus: '+guy.patronus+
'<br> hogwarts Student: '+guy.hogwartsStudent+
'<br> hogwarts Staff: '+guy.hogwartsStaff+
'<br> Actor: '+guy.actor+
'<br> Alive: '+guy.alive+'<br></div>');


});


});