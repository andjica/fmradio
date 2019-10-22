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
<h3 class="text-danger my-5">Add playlist</h3>
<div class="row">
<table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col"><i class="fa fa-music"></i></th>
                <th scope="col">Playlist</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once "config/connection.php";
                    
                    $query = "SELECT * from playlists";
                    $st = $connection->prepare($query);
                    $st->execute();
                    $playlists = $st->fetchAll();
                    
                    foreach($playlists as $playlist):
                ?>
                <tr>
                <th scope="row"><?= $playlist->id ?></th>
                <td><?= $playlist->title ?></td>
               </tr>
                <?php  endforeach; ?>
                
            </tbody>
            </table>
</div>

    <div class="row my-4">
        <div class="col-lg-4">
            <?php include "views/sidebar.php"; ?>
        </div>
        <div class="col-lg-4 border p-3 rounded">
        <form action="php/create-playlist.php" method="POST" accept-character="utf-8">
        <div class="card">
            <div class="card-header">
            <h3 class="text-dark">CREATE playlist</h3>
            <?php if(isset($_REQUEST['success'])=="done")
            {
                echo "<div class='alert alert-success' role='alert'>
                You choose song for playlist succesfully :)
            </div>";
            }?>
            <?php if(isset($_REQUEST['greske'])=="greska")
            {
                echo "<div class='alert alert-danger' role='alert'>
                Playlist field and Song are required filed
            </div>";
            }?>
            </div>
        </div>

            <div class="form-group">
                <label for="Songname">Choose list </label>
                <select name="list-playlist">
      

                    <?php $query = "SELECT * FROM playlists";
                        $pls = executeQuery($query);
                        foreach($pls as $pl):
                    ?>
                    <option value="<?= $pl->id?>"><?= $pl->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Songname">Choose song</label>
                <select name="list-song">
                    <option value="0">Choose song</option>
                    <?php $query2 = "SELECT * FROM songs";
                        $sngs = executeQuery($query2);
                        foreach($sngs as $sn):
                    ?>
                    <option value="<?= $sn->id?>"><?= $sn->song_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="create">Submit</button>
            </form>
        </div>
        <div class="col-lg-4 border p-3 rounded">
        <div class="card">
            <div class="card-header bg-dark">
            <h3 class="text-white">Playlist</h3>
            </div>
            <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col"><i class="fa fa-music"></i> &nbsp; Song name</th>
                <th scope="col">Artist</th>
                <th scope="col">Remove song from playlist</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $songsfromPlaylist = "SELECT s.song_name AS songName, s.artist_name AS artist,
                s.id AS songId FROM songs s 
                INNER JOIN playlists_songs pl ON s.id=pl.id_song 
                INNER JOIN playlists p ON pl.id_playlist=p.id WHERE p.active = 1";

                $res = executeQuery($songsfromPlaylist);
                foreach($res as $r):
            ?>
                <tr>
                <td scope="row"><?= $r->songName ?></td>
                <td><?= $r->artist ?></td>
                <td> <a href="" class="remove-song" data-id="<?= $r->songId ?>"><i class="fa fa-minus text-dark fa-2x"></i></a></td>
               </tr>
                <?php  endforeach; ?>
                
            </tbody>
            </table>
</div>
                
        </div>
                </div>
    </div>
</div>
<?php include "views/footer.php"; ?>