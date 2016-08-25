window.onload = function () {
    var vm = new Vue({
        el: '#el',
        data: {
            Players: {
                player_1: "",
                player_2: ""
            },
            AvailableIngredients: [],
            Game: {
                round: null
            }
        },
        methods: {
            signIn: function () {
                var json_data = {
                    player_1: this.Players.player_1,
                    player_2: this.Players.player_2
                };
                this.$http.post('/sign-in-names', JSON.stringify(json_data))
                    .then(
                        function (response) {
                            this.$set('Game', response.data.Game);
                            this.$set('Players', response.data.Players);
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