// player => run, jump, kickball
// ...... => name, age, energy

// let player = {};
// player.name = "Doha";
// player.age = 34;
// player.energy = 100;

// let gammer = Object.create(player);
// gammer.name = "fadoua";
// console.log(gammer.name);

// player.run = function(speed) {
//     this.energy -= speed;
//     console.log(this.energy);
// };

// player.jump = function(hight) {
//     this.energy += hight;
//     console.log(this.energy);
// };

// player.kickball = function(strenght) {
//     this.energy -= strenght;
//     console.log(this.energy);
// };

// player.run(70);

function Player(name, age, energy) {
    let player = Object.create(Player.prototype);
    player.name = name;
    player.age = age;
    player.energy = energy;

    return player;
}
Player.prototype.run = function(speed) {
    this.energy -= speed;
    console.log(this.energy);
};
Player.prototype.jump = function(hight) {
    this.energy += hight;
    console.log(this.energy);
};

Player.prototype.kickball = function(strenght) {
    this.energy -= strenght;
    console.log(this.energy);
};

const player_1 = Player("doha", 20, 100);
const player_2 = Player("fadoua", 20, 100);

player_1.jump(60);



