<?php
    session_start();
    
    if(! $_SESSION['user'])
    {
        return header("Location: index.php");
    }
    
    include "views/header.php";
    include "views/nav.php";

   
   
?>

<div class="container p-5">
<h3 class="text-danger my-5">Add image to song</h3>

<div class="row">
<table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col"><i class="fa fa-music"></i></th>
                <th scope="col"></th>
                <th scope="col">Song</th>
                <th scope="col">Name of song</th>
                <th scope="col">Name of artist</th>
                <th scope="col">Name of album</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once "config/connection.php";
                    
                    $query = "SELECT s.id AS idSong, s.song_url, s.description,
                    s.song_name, s.artist_name, s.album_name, i.url AS url
                    FROM songs s INNER JOIN images i ON s.img_id=i.id WHERE s.active_img = :active";
                    $active = 1;
                    $st = $connection->prepare($query);
                    $st->bindParam(":active",$active);
                    $st->execute();
                    $songs = $st->fetchAll();
                    
                    foreach($songs as $song):
                ?>
                <tr>
                <th scope="row"><?= $song->idSong ?></th>
                <td><img src="<?= $song->url ?>" style="widht:60px;height:60px;"/></td>
                <td><?= $song->song_url ?></td>
                <td><?= $song->song_name ?></td>
                <td><?= $song->artist_name ?></td>
                <td><?= $song->album_name ?></td>
               </tr>
                <?php  endforeach; ?>
                
            </tbody>
            </table>
</div>
<?php if(isset($_REQUEST['success'])=="done")
    {
        echo "<div class='alert alert-success' role='alert'>
        You create a video for song successfully! :)
      </div>";
    }?>
    <div class="row my-4">
        <div class="col-lg-4">
            <?php include "views/sidebar.php"; ?>
        </div>
        <div class="col-lg-8 border p-3 rounded">
        <form action="php/create-video.php" method="POST" enctype="multipart/form-data" accept-character="utf-8">
        <div class="card">
            <div class="card-header">
            <h3 class="text-dark">CREATE Video</h3>
            </div>
        </div>
            <div class="form-group">
                <label for="exampleSong">Video</label>
                <input type="file" class="form-control-file" name="video">
                <small id="emailHelp" class="form-text text-muted">Upload your video</small>
            </div>
            <div class="form-group">
                <label for="Songname">Give Song name:</label>
                <input type="text" class="form-control" name="songname" placeholder="Song">
            </div>
            <div class="form-group">
                <label for="Artist">Artist name:</label>
                <input type="text" class="form-control" name="artist"  placeholder="Artist name">
            </div>
            <button type="submit" class="btn btn-primary" name="create">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include "views/footer.php"; ?>