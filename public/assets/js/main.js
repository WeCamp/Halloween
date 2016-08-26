window.onload = function () {

    var playerOne = {
        id: 1,
        name: "Petar",
        isGameOver: false,
        alreadyChosenIngredients: [],
        chosenIngredients: []
    };
    var playerTwo = {
        id: 2,
        name: "Jenny",
        isGameOver: false,
        alreadyChosenIngredients: [],
        chosenIngredients: []
    };
    var roundResult = {
        playerOneResult: false,
        playerTwoResult: true
    };
    var game = {
        gameId: null,
        gameState: "confirmRoundResult",
        gameCurrentPlayer: playerOne,
        roundNo: 1,
        roundResult: roundResult,
        availableIngredients: [],
        Players: {
            PlayerOne: playerOne,
            PlayerTwo: playerTwo
        }
    };

    var vm = new Vue({
        el: '#el',
        data: game,
        methods: {
            initialiseGame: function () {
                var json_data = {
                    playerOne: this.Players.PlayerOne.name,
                    playerTwo: this.Players.PlayerTwo.name
                };
                this.$http.post('/initialise-game', JSON.stringify(json_data))
                    .then(
                        function (response) {
                            this.$set('gameId', response.data.gameId);
                            this.$set('gameState', "passToPlayer");
                            this.$set('Players.PlayerOne.Name', response.data.playerOne);
                            this.$set('Players.PlayerTwo.Name', response.data.playerTwo);
                            this.$set('availableIngredients', response.data.ingredients);
                        },
                        function (response) {
                            // error
                            alert(response.error);
                        }
                    );
            },
            chooseIngredients: function () {
                game.gameState = "chooseIngredients";
            },
            confirmIngredients: function () {
                if (this.gameCurrentPlayer.id == 1) {
                    game.gameCurrentPlayer = this.Players.PlayerTwo;
                    game.gameState = "chooseIngredients";
                } else {
                    game.gameState = "confirmRoundResult";
                }
            },
            finishRound: function () {
                console.log(this.roundResult);
                var request = {
                    gameId: this.gameId,
                    playerOneResult: this.roundResult.playerOneResult,
                    playerTwoResult: this.roundResult.playerTwoResult
                };
                this.$http.post('/finish-round', JSON.stringify(request))
                .then(
                    function(response){

                    },
                    function(error){

                    }
                )
            }
        }
    })
};
$(document).ready(function () {

    function makeVisible() {
        $('.step-item').each(function (i) {

            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            /* If the object is completely visible in the window, fade it it */
            if (bottom_of_window > bottom_of_object) {

                $(this).animate({'opacity': '1'}, 500);

            }

        });
    }

    $(window).on("load", function () {
        makeVisible();
    });

    /* Every time the window is scrolled ... */
    $(window).scroll(function () {

        makeVisible();

    });

});
