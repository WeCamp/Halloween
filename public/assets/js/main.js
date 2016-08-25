window.onload = function () {
    var vm = new Vue({
        el: '#el',
        data: {
            Game: {
                gameId: null,
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
            },
        },
        methods: {
            initialiseGame: function () {
                var json_data = {
                    playerOne: this.Players.PlayerOne.name,
                    playerTwo: this.Players.PlayerTwo.name
                };
                this.$http.post('/initialise-game', JSON.stringify(json_data))
                    .then(
                        function (response) {
                            this.$set('Game.id', response.data.Game.gameId);
                            this.$set('Players.Player1.Name', response.data.playerOne);
                            this.$set('Players.Player2.Name', response.data.playerTwo);
                            this.$set('Game.Round.availableIngredients', response.data.ingredients);
                        },
                        function (response) {
                            // error
                            alert(response.error);
                        }
                    );
            }
        }
    })
};