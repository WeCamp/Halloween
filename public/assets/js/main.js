window.onload = function () {

    var playerOne = {
        id: 1,
        name: "",
        alreadyChosenIngredients: [],
        chosenIngredients: []
    };
    var playerTwo = {
        id: 2,
        name: "",
        alreadyChosenIngredients: [],
        chosenIngredients: []
    };

    function getGame() {
        playerOne.chosenIngredients = [];
        playerTwo.chosenIngredients = [];
        return {
            gameId: null,
            gameState: "signIn",
            gameCurrentPlayer: playerOne,
            roundNumber: 1,
            roundResult: {
                playerOneResult: false,
                playerTwoResult: false
            },
            availableIngredients: [],
            Players: {
                PlayerOne: playerOne,
                PlayerTwo: playerTwo
            },
            winner: false,
        };
    }

    var game = getGame();

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
                this.$set('gameState', "chooseIngredients");
            },
            confirmIngredients: function () {
                if (this.gameCurrentPlayer.id == 1) {
                    this.$set('gameCurrentPlayer', this.Players.PlayerTwo);
                    this.$set('gameState', "chooseIngredients");
                } else {
                    this.$set('gameState', "confirmRoundResult");
                }
            },
            finishRound: function () {
                var request = {
                    gameId: this.gameId,
                    playerOneResult: this.roundResult.playerOneResult,
                    playerTwoResult: this.roundResult.playerTwoResult
                };
                var response = {
                    "gameId": "",
                    "players": {
                        "playerOne": "",
                        "playerTwo": ""
                    },
                    "finishedRound": 0,
                    "status": "winner",
                    "winner": "Rover"
                };

                switch(response.status) {
                    case 'unfinished' :
                        this.$set('roundNumber', response.finishedRound + 1);
                        this.$set('gameState', 'passToPlayer');
                        this.$set('roundResult', {
                            playerOneResult: false,
                            playerTwoResult: false
                        });
                        break;
                    case 'winner':
                        this.$set('gameState', 'congratulateWinner');
                        this.$set('winner', response.winner);
                        break;
                    case 'draw':
                        this.$set('gameState', 'draw');
                        break;
                }
            },

            newGame: function() {
                this.$data = getGame();
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
