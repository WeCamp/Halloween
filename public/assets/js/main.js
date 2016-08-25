window.onload = function () {
    var vm = new Vue({
        el: '#el',
        data: {
            Game: {
                gameId: null,
                gameState: "signIn",
                gameStatePlayerId: 1,
                Round: {
                    no: 1,
                    availableIngredients: []
                },
                Players: {
                    PlayerOne: {
                        name: "",
                        isGameOver: false,
                        alreadyChosenIngredients: [],
                        chosenIngredients: []
                    },
                    PlayerTwo: {
                        name: "",
                        isGameOver: false,
                        alreadyChosenIngredients: [],
                        chosenIngredients: []
                    }
                }
            }
        },
        methods: {
            initialiseGame: function () {
                var json_data = {
                    playerOne: this.Game.Players.PlayerOne.name,
                    playerTwo: this.Game.Players.PlayerTwo.name
                };
                this.$http.post('/initialise-game', JSON.stringify(json_data))
                    .then(
                        function (response) {
                            this.$set('Game.id', response.data.Game.gameId);
                            this.$set('Game.gameState', "passToPlayer");
                            this.$set('Game.Players.PlayerOne.Name', response.data.playerOne);
                            this.$set('Game.Players.PlayerTwo.Name', response.data.playerTwo);
                            this.$set('Game.Round.availableIngredients', response.data.ingredients);
                        },
                        function (response) {
                            // error
                            alert(response.error);
                        }
                    );
            },
            chooseIngredients: function(){
                this.Game.gameState = "chooseIngredients";
            },
            confirmIngredients: function(){
                if(this.Game.gameStatePlayerId == 1){
                    this.Game.gameStatePlayerId = 2;
                    this.Game.gameState = "chooseIngredients";
                }else{
                    this.Game.gameState = "roundUp";
                }
            }
        }
    })
};
$( document ).ready(function() {

	function makeVisible() {
		$('.step-item').each( function(i){
	          
	        var bottom_of_object = $(this).offset().top + $(this).outerHeight();
	        var bottom_of_window = $(window).scrollTop() + $(window).height();
	        
	        /* If the object is completely visible in the window, fade it it */
	        if( bottom_of_window > bottom_of_object ){
	            
	            $(this).animate({'opacity':'1'},500);
	                
	        }
	        
	    }); 
	}

	$(window).on("load", function() {
		makeVisible();
	});

	/* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        makeVisible();
    
    });

});