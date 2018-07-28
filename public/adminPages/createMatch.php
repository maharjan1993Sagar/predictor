<?php
$title="home";
include "../layout/layoutHeader.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="min-height: 353px;">
           <h2>Create Match</h2>

                <form action="post_match.php" method="post">
                    <div class="form-group row">
                        <label  class="col-md-2 col-form-label">Home Team</label>
                        <div class="col-md-6">
                            <input name="home_team" type="text" class="form-control"  placeholder="Home Team">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-md-2 col-form-label">Away Team</label>
                        <div class="col-md-6">
                            <input name="away_team" type="text" class="form-control"  placeholder="Away Team">
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-10">
                    <input type="submit" text="Submit" class="btn btn-primary" >
                    </div>
                </form>

        </div>
    </div>
</div>
<?php include "../layout/layoutFooter.php";?>