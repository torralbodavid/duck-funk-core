# Changelog

All notable changes to `duck-funk-core` will be documented in this file

## 0.4.1 - 2020-04-26

### Added
- Added support for project page controllers.
    + You will be redirected by default to your page slug blade.
    + You can create your PageControllers on the project at `App/App\Http\Controllers\Pages` namespace and with the name `SlugController`.
    + You can pass additional data to the blade by overriding `getData` method. Page object is always injected.
- You can get page route by calling `coure()->page('slug')`

### Fixed
- Route and styles corrections

## 0.4.0 - 2020-04-26

### Added
- Dynamic page control

### Fixed
- Delete icons, fonts and images which are not being used

## 0.3.0 - 2020-03-03

### Added
- Larevel 7 support

## 0.2.0 - 2020-02-20

### Added
- Added create news page at housekeeping.
- Added option to register directly from client.
    + Option to create user and customize username, look and create initial room.
 - Added faker helper in order to create random data
 - Add API support for update nickname, look and create initial room.
 - Add social login through facebook
 - Add new home blades
 - Add new User relationships: Friend Requests and Friends.
 - Add new Room relationship: Items. Now you can know items from a room.
 - Add new keko naming through config. Now you can choose the naming of your avatars.

### Modified
- Updated housekeeping permissions
- Refactored housekeeping menu.
- Refactored login. Now will run through this core package.
- Refactored user registration. Now will run through event.

## 0.1.0 - 2019-12-16

### Added
- Labs dependencies now runs through mix.

### Fixed
- Deleted tons of useless javascript files.

## 0.0.3 - 2019-12-12

### Added
- Add test environment: Added factories, test database migrations and first tests.
- Labs: Add housekeeping engine: Access through session checking that user has the correct permissions. Also added dashboard layout.

### Modified
- Update dependencies
- Some code refactor

## 0.0.2 - 2019-11-13

### Added
- Ban middleware
- New Habbo based icons released. Those can be found at `src/resources/assets/scss/_sprites.scss`.
   #### Mid Icon usage
   
   	```
        <i class="retro-mid retro-mid-{slug}"></i>
    ```
     
  #### Icon usage
  
  	```
        <i class="retro-mid retro-{slug}"></i>
    ```
  
  #### Examples:

	```
    <i class="retro-mid retro-mid-alert_triangle"></i>
    <i class="retro retro-clock"></i>
    ```
    

### Modified
- Some refactor such as `src/routes/duck-funk.php`

## 0.0.1 - 2019-10-29

- Initial release

### Added
- Styles of the fuse template
- HTML of the home for the fuse template
- SSO ticket generator to enable users log in
- Add new configurable params into the config file
- Add simple hotel view    
- Add the following RCON commands in `Traits/RCONConnection.php`
    1. alertUser
    2. changeRoomOwner
    3. createModToolTicket
    4. disconnect
    5. executeCommand
    6. forwardUser
    7. sendFriendRequest
    8. giveBadge
    9. giveClothing
    10. giveCredits
    11. givePixels
    12. givePoints
    13. giveRespect
    14. hotelAlert
    15. ignoreUser
    16. imageAlertUser
    17. imageHotelAlert
    18. progressAchievement
    19. createRoomEvent
    20. sendGift
    21. sendRoomBundle
    21. setMotto
    22. setRank
    23. sendStaffAlert
    24. stalkUser
    25. talkUser
    26. updateCatalog
    27. updateUser
    28. updateWordFilter
