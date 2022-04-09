# CommandSpy
See all commands executed by players

-----------------

## Base configuration

    # Setup here the error message
    no-permission: " You don't have this permission to use this command"

    # Setup here message to send when player can see all commands
    confirmspy: " You are now in spy-mode"
    stopspy: " You are no longer in spy-mode"
    
    # Setup here the message, the player will see when he will be in the spy-mode
    format-spy: " {player} : {message}"
    
    # Setup here if you want all commands execute by player will send in the console
    ConsoleMessage: "true"

-----------------

## Commands
    command: /commandspy
    aliases: [/spy, /cmdspy, /cmd]
    defaul: op

-----------------

-----------------

## Permissions
    permissions: commandspy.use
    defaul: op

-----------------
