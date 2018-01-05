var game = new Phaser.Game(window.innerWidth/2.5,window.innerWidth/3, Phaser.AUTO, '', { preload: preload, create: create, update: update , render: render});

function preload() {

    game.load.image('sky', 'src/img/sky.png');
    game.load.spritesheet('ground', 'src/img/platform.png', 32, 32);
    game.load.spritesheet('hero', 'src/img/betteraveMan.png', 32, 32);

    game.load.tilemap('map', 'src/tilemap.json', null, Phaser.Tilemap.TILED_JSON);
}

var player;
var platforms;
var cursors;

<<<<<<< Updated upstream
=======
var stars;
var score = 0;
var scoreText;

var tutorialDialogue = [
    'Bonjour jeune homme, tu es ici dans le fabuleux monde du JavaScript !',
    'Tu ne dois pas savoir pourquoi tu es ici je suppose ?',
    'C\'est très simple, tu es l\'élu de la prophétie !',
    'Celui qui rammènera l\'ordre dans notre royaume !'
];

>>>>>>> Stashed changes
function create() {
    // var sky = game.add.sprite(0, 0, 'sky');
    // sky.scale.setTo(window.innerWidth/2000,window.innerWidth/1500);

    game.stage.backgroundColor = "#9bffff";
    

    map = game.add.tilemap('map');
    map.addTilesetImage('ground');

    layer = map.createLayer('level_1');
    layer.resizeWorld();

    //  We're going to be using physics, so enable the Arcade Physics system
    game.physics.startSystem(Phaser.Physics.ARCADE);

    map.setCollisionBetween(1, 12);


    // The player and its settings
    player = game.add.sprite(0, 0, 'hero');

    //  We need to enable physics on the player
    game.physics.arcade.enable(player);

    //  Player physics properties. Give the little guy a slight bounce.
    player.body.bounce.y = 0.2;
    player.body.gravity.y = 1000;
    player.body.collideWorldBounds = true;

    game.camera.follow(player);

    //  Our two animations, walking left and right.
    player.animations.add('left', [0, 1, 2, 3], 10, true);
    player.animations.add('right', [5, 6, 7, 8], 10, true);

    //  Our controls.
    cursors = game.input.keyboard.createCursorKeys();

    player.body.collideWorldBounds = true;
}


function update() {

    //  Collide the player with the platforms
    game.physics.arcade.collide(player, layer);

    //  Reset the players velocity (movement)
    player.body.velocity.x = 0;

    player.setGravity = function(gravity){
        player.body.gravity.y = gravity;
    }

    if (cursors.left.isDown)
    {
        //  Move to the left
        player.body.velocity.x = -150;
        player.animations.play('left');
    }
    else if (cursors.right.isDown)
    {
        //  Move to the right
        player.body.velocity.x = 150;
        player.animations.play('right');
    }
    else
    {
        //  Stand still
        player.animations.stop();
        player.frame = 4;
    }

    if(player.body.coll){
        player.body.touching.down = true;
    }
    
    //  Allow the player to jump if they are touching the ground.
    if (cursors.up.isDown && player.body.blocked.down)
    {
        player.body.velocity.y = -350;
    }



}

function render(){
    // game.debug.bodyInfo(player, 16, 24);
}