<?php

namespace Torralbodavid\DuckFunkCore\Http\Traits;

use Illuminate\Http\JsonResponse;
use Torralbodavid\DuckFunkCore\Http\RCON\RCONSocket;

/**
 * Trait RCONConnection.
 */
trait RCONConnection
{
    /**
     * Send a alert to a online user.
     * @param string $message The message to send.
     * @param int $user_id The id of the user to alert.
     * @return JsonResponse
     */
    public static function alertUser(string $message, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'AlertUser',
            'data' => [
                'message' => $message,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Change room owner.
     * @param int $room_id The id of the room to change.
     * @param int $user_id The new user id of the room.
     * @param string $username The new owner name of the room.
     * @return JsonResponse
     */
    public static function changeRoomOwner(int $room_id, int $user_id, string $username)
    {
        return (new RCONSocket([
            'key' => 'ChangeRoomOwner',
            'data' => [
                'room_id' => $room_id,
                'user_id' => $user_id,
                'username' => $username,
            ],
        ]))->run();
    }

    /**
     * Create mod ticket.
     * @param string $message The message that was included in the report.
     * @param int $reported_id User id of the reported player.
     * @param int $reported_room_id The room that was reported.
     * @param string $reported_username Username of the reported player.
     * @param int $sender_id User id who created the ticket.
     * @param string $sender_username Username who created the ticket.
     * @return JsonResponse
     */
    public static function createModToolTicket(
        string $message,
        int $reported_id,
        int $reported_room_id,
        string $reported_username,
        int $sender_id,
        string $sender_username)
    {
        return (new RCONSocket([
            'key' => 'ModTicket',
            'data' => [
                'message' => $message,
                'reported_id' => $reported_id,
                'reported_room_id' => $reported_room_id,
                'reported_username' => $reported_username,
                'sender_id' => $sender_id,
                'sender_username' => $sender_username,
            ],
        ]))->run();
    }

    /**
     * Disconnect a user.
     * @param string $username Optional user id of the player to disconnect.
     * @param int|null $user_id Optional username of the player to disconnect.
     * @return JsonResponse
     */
    public static function disconnect(string $username = null, int $user_id = null)
    {
        $response = [
            'key' => 'disconnect',
            'data' => [],
        ];

        ($username != null ? $response['data']['username'] = $username : $response['data']['user_id'] = $user_id);

        return (new RCONSocket($response))->run();
    }

    /**
     * Execute a command through user id.
     * @param string $command Complete string including the semicolon at the start for the command to execute.
     * @param int $user_id User id of the player to execute the command for.
     * @return JsonResponse
     */
    public static function executeCommand(string $command, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'executeCommand',
            'data' => [
                'command' => $command,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Forward an user into a selected room.
     * @param int $room_id Room id of the room to forward the player to.
     * @param int $user_id User id of the player to forward.
     * @return JsonResponse
     */
    public static function forwardUser(int $room_id, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'forwardUser',
            'data' => [
                'room_id' => 42,
                'user_id' => 2,
            ],
        ]))->run();
    }

    /**
     * Send a friend request.
     * @param int $target_id User id of the player that receives a friend request.
     * @param int $user_id User id of the player that creates a friend request.
     * @return JsonResponse
     */
    public static function sendFriendRequest(int $target_id, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'friendRequest',
            'data' => [
                'target_id' => $target_id,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Give a badge to an user.
     * @param string $badge Badge code of the badge that the player will receive.
     * @param int $user_id User id of the player that receives a badge.
     * @return JsonResponse
     */
    public static function giveBadge(string $badge, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'giveBadge',
            'data' => [
                'badge' => $badge,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Give clothes to an user.
     * @param int $clothing_id The clothing ID
     * @param int $user_id The id of the user to alert.
     * @return JsonResponse
     */
    public static function giveClothing(int $clothing_id, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'giveClothing',
            'data' => [
                'clothing_id' => $clothing_id,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Give credits to an user.
     * @param int $credits Amount of credits that the player will be awarded.
     * @param int $user_id User id of the player that will receive credits.
     * @return JsonResponse
     */
    public static function giveCredits(int $credits, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'giveCredits',
            'data' => [
                'credits' => $credits,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Give pixels to an user.
     * @param int $pixels Amount of pixels that the player will be awarded.
     * @param int $user_id User id of the player that will receive the pixels.
     * @return JsonResponse
     */
    public static function givePixels(int $pixels, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'givePixels',
            'data' => [
                'pixels' => $pixels,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * @param int $points Amount of points that the player will be awarded.
     * @param int $type The type of points that the player will be awarded.
     * @param int $user_id User id of the player that will be awarded.
     * @return JsonResponse
     */
    public static function givePoints(int $points, int $type, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'givePoints',
            'data' => [
                'points' => $points,
                'type' => $type,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Give respects to someone.
     * @param int $daily_respects Amount that will be added to the current daily respect points.
     * @param int $respect_given Amount that will be counted towards given respect statistic.
     * @param int $respect_received Amount that will be counted towards received respect statistic.
     * @param int $user_id User id of the player that will receive the respect.
     * @return JsonResponse
     */
    public static function giveRespect(int $daily_respects, int $respect_given, int $respect_received, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'GiveRespect',
            'data' => [
                'daily_respects' => $daily_respects,
                'respect_given' => $respect_given,
                'respect_received' => $respect_received,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Send an alert to everyone online.
     * @param string $message The message to display to all users online.
     * @param string $url The link to include.
     * @return JsonResponse
     */
    public static function hotelAlert(string $message, string $url = null)
    {
        $response = [
            'key' => 'hotelAlert',
            'data' => [
                'message' => $message,
            ],
        ];

        ($url != null ? $response['data']['url'] = $url : $response);

        return (new RCONSocket($response))->run();
    }

    /**
     * Ignore an user.
     * @param int $target_id User id of the player that will be ignored
     * @param int $user_id User id of the player that will ignore target_id.
     * @return JsonResponse
     */
    public static function ignoreUser(int $target_id, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'ignoreUser',
            'data' => [
                'target_id' => $target_id,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Send an image alert to an user.
     * @param string $bubble_key Key of the bubble alert to define extra parameters in the external_flash_texts.
     * @param string $display_type Display type
     * @param string $image Image to display.
     * @param string $message The message parameter that needs to be set.
     * @param string $title Title of the popup window.
     * @param string $url The url parameter that needs to be set.
     * @param string $url_message The message of the url parameter that needs to be set.
     * @param int $user_id The user id of the user that will receive the alert
     * @return JsonResponse
     */
    public static function imageAlertUser(string $bubble_key, string $display_type, string $image, string $message, string $title, string $url, string $url_message, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'imageAlertUser',
            'data' => [
                'bubble_key' => $bubble_key,
                'display_type' => $display_type,
                'image' => $image,
                'message' => $message,
                'title' => $title,
                'url' => $url,
                'url_message' => $url_message,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Send an alert to all online users.
     * @param string $bubble_key Key of the bubble alert to define extra parameters in the external_flash_texts.
     * @param string $display_type Display type
     * @param string $image Image to display.
     * @param string $message The message parameter that needs to be set.
     * @param string $title Title of the popup window.
     * @param string $url The url parameter that needs to be set.
     * @param string $url_message The message of the url parameter that needs to be set.
     * @return JsonResponse
     */
    public static function imageHotelAlert(string $bubble_key, string $display_type, string $image, string $message, string $title, string $url, string $url_message)
    {
        return (new RCONSocket([
            'key' => 'imageAlertUser',
            'data' => [
                'bubble_key' => $bubble_key,
                'display_type' => $display_type,
                'image' => $image,
                'message' => $message,
                'title' => $title,
                'url' => $url,
                'url_message' => $url_message,
            ],
        ]))->run();
    }

    /**
     * Add progress to an user achievement.
     * @param int $achievement_id ID of the achievement.
     * @param int $progress Amount to progress.
     * @param int $user_id User id of the player that needs an achievement progress.
     * @return JsonResponse
     */
    public static function progressAchievement(int $achievement_id, int $progress, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'progressAchievement',
            'data' => [
                'achievement_id' => $achievement_id,
                'progress' => $progress,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Add a room event into a room.
     * @param string $message Message that will have the room event
     * @param int $room_id Room id of the room that will have the event
     * @param int $user_id
     * @return JsonResponse
     */
    public static function createRoomEvent(string $message, int $room_id, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'roomEvent',
            'data' => [
                'message' => $message,
                'room_id' => $room_id,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Send a gift to an user.
     * @param int $itemid Item id to gift.
     * @param string $message Message to include in the gift.
     * @param int $user_id User id of the player that receives a gift.
     * @return JsonResponse
     */
    public static function sendGift(int $itemid, string $message, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'sendGift',
            'data' => [
                'itemid' => $itemid,
                'message' => $message,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Send room bundle to an user.
     * @param int $catalog_page Id of the catalog page to buy.
     * @param int $user_id User id of the player that will receive a room bundle.
     * @return JsonResponse
     */
    public static function sendRoomBundle(int $catalog_page, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'sendRoomBundle',
            'data' => [
                'catalog_page' => $catalog_page,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Change the motto of an user.
     * @param string $motto The motto to set.
     * @param int $user_id The user id to change the motto for.
     * @return JsonResponse
     */
    public static function setMotto(string $motto, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'setMotto',
            'data' => [
                'motto' => $motto,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * Update an user rank.
     * @param int $rank ID of the rank to set.
     * @param int $user_id User id of the player to set the rank for.
     * @return JsonResponse
     */
    public static function setRank(int $rank, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'setRank',
            'data' => [
                'rank' => $rank,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * @param string $message The message to send to all staff online.
     * @return JsonResponse
     */
    public static function sendStaffAlert(string $message)
    {
        return (new RCONSocket([
            'key' => 'staffAlert',
            'data' => [
                'message' => $message,
            ],
        ]))->run();
    }

    /**
     * Follow an user to another room.
     * @param int $follow_id The user to stalk to.
     * @param int $user_id User id of the player to stalk to another user.
     * @return JsonResponse
     */
    public static function stalkUser(int $follow_id, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'stalkUser',
            'data' => [
                'follow_id' => $follow_id,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * @param int $bubble_id Bubble type. -1 defaults to the user type.
     * @param string $message The message to say.
     * @param string $type Talk type to use: - talk - whisper - shout
     * @param int $user_id User id of the player to talk.
     * @return JsonResponse
     */
    public static function talkUser(int $bubble_id, string $message, string $type, int $user_id)
    {
        return (new RCONSocket([
            'key' => 'talkUser',
            'data' => [
                'bubble_id' => $bubble_id,
                'message' => $message,
                'type' => $type,
                'user_id' => $user_id,
            ],
        ]))->run();
    }

    /**
     * @param string $message Intern message
     * @return JsonResponse
     */
    public static function updateCatalog(string $message)
    {
        return (new RCONSocket([
            'key' => 'updatecatalog',
            'data' => [
                'message' => $message,
            ],
        ]))->run();
    }

    /**
     * @param int $achievement_score Add achievement score.
     * @param int $block_camera_follow Optional: Block camera following.
     * @param int $block_following Optional: Block following in the hotel.
     * @param int $block_friendrequests Optional: Block friendrequests in the hotel.
     * @param int $block_roominvites Optional: Block receiving room invites in the hotel.
     * @param string $look Optional: Look of the player.
     * @param int $old_chat Optional: Use new chat.
     * @param int $user_id User id of the player to update.
     * @return JsonResponse
     */
    public static function updateUser(int $achievement_score, int $block_camera_follow, int $block_following, int $block_friendrequests, int $block_roominvites, string $look, int $old_chat, int $user_id)
    {
        $response = [
            'key' => 'updateUser',
            'data' => [
                'achievement_score' => $achievement_score,
                'user_id' => $user_id,
            ],
        ];

        ($block_camera_follow != null ? $response['data']['block_camera_follow'] = $block_camera_follow : $response);
        ($block_following != null ? $response['data']['block_following'] = $block_following : $response);
        ($block_friendrequests != null ? $response['data']['block_friendrequests'] = $block_friendrequests : $response);
        ($block_roominvites != null ? $response['data']['block_roominvites '] = $block_roominvites : $response);
        ($look != null ? $response['data']['look'] = $look : $response);
        ($old_chat != null ? $response['data']['old_chat'] = $old_chat : $response);

        return (new RCONSocket($response))->run();
    }

    /**
     * @param string $message Intern message
     * @return JsonResponse
     */
    public static function updateWordFilter(string $message)
    {
        return (new RCONSocket([
            'key' => 'updateWordFilter',
            'data' => [
                'message' => $message,
            ],
        ]))->run();
    }
}
