<?php
/**
 * Created by IntelliJ IDEA.
 * User: diddy
 * Date: 3/25/2017
 * Time: 12:31 AM
 */

namespace App;


use GetStream\Stream\Client;

class StreamFeed
{

    protected $client;
    protected $user ;

    public function __construct($id)
    {
        $this->client = new Client('tkr9a7w9fnxx', 'b8eezgf56u79nncazfv86trwuz8k969mbragz4ur6627ds3jbeqzs6che55bzm93');

        // Set API endpoint location
        $this->client->setLocation('us-east');

      // Instantiate a feed object
//        $user_feed_1 = $client->feed('user', '1');
        $this->user = $this->client->feed('user', $id);

    }

    public function getActivities(){

        return $this->user->getActivities(1,20);
    }

    public function addActivity($actor,$verb,$object="3",$foreign_id=""){
        $data = [
            "actor"=>"$actor",
            "verb"=>"$verb",
            "object"=>"$object",
            "foreign_id"=>"$foreign_id"
        ];
        $this->user->addActivity($data);
    }

    public function deleteFeed(){
        $this->user->delete();
    }

    public function followFeed($type="flat",$user_id){
        $this->user->followFeed($type,$user_id);
    }

    public function unfollowFeed($type="flat",$user_id){
        $this->user->unfollowFeed($type,$user_id);
    }

    public function addActivityToOtherUsers($actor="1",$verb="like",$object="3",$to=[]){
        // Add an activity and push it to other feeds too using the `to` field
        $data = [
            "actor"=>"$actor",
            "verb"=>"$verb",
            "object"=>"$object",
            "to"=>$to
//            "to"=>["user:44", "user:45"]
        ];
        $this->user->addActivity($data);
    }

    public function addToManyFeeds($actor,$verb,$object,$feeds_array=[]){
        // Batch operations (batch activity add, batch follow)
        $batcher = $this->client->batcher();

// Add one activity to many feeds
//        $activity = array('actor' => '1', 'verb' => 'tweet', 'object' => '1');
        $activity = array('actor' => $actor, 'verb' => $verb, 'object' => $object);
//        $feeds = ['flat:user1', 'flat:user2'];
        $feeds = $feeds_array;
        $batcher->addToMany($activity, $feeds);
    }

    public function getFollowing(){
        return $this->user->following(0,20);
    }

    public function getFollowers(){
        return $this->user->followers(0,20);
    }


}