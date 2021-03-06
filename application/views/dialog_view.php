<section class="content">

  <div class="row">
    <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <?php
                    $img = $_SESSION['auchUsersSetings']['ava'];
                    if (file_exists($img)) { ?>
                        <img class="profile-user-img img-responsive img-circle" src="<?=$_SESSION['auchUsersSetings']['ava'];?>" alt="<?=$_SESSION['auchUsersSetings']['name'];?>">
                    <?php
                    } else { ?>
                        <img class="profile-user-img img-responsive img-circle" src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="<?=$_SESSION['auchUsersSetings']['name'];?>">
                    <?php
                    }
                  ?>
                  <h3 class="profile-username text-center"><?=$_SESSION['auchUsersSetings']['name'];?></h3>
                  <p class="text-muted text-center"><?=$_SESSION['auchUsersSetings']['posada'];?></p>

                  <!--<ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                           <b>Повідомленнь</b> <a class="pull-right">255</a>
                        </li>
                        <li class="list-group-item">
                           <b>Оголошеннь</b> <a class="pull-right">255</a>
                        </li>
                      </ul>-->

                  <!--<a href="#" class="btn btn-primary btn-block"><b>Підписатись</b></a>
                  <a href="#" class="btn btn-success btn-block"><b>Повідомлення</b></a>-->
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Про мене</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Освіта</strong>
                  <p class="text-muted"><?=$_SESSION['auchUsersSetings']['education'];?></p>
                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Адреса</strong>
                  <p class="text-muted"><?=$_SESSION['auchUsersSetings']['address'];?></p>
                  <hr>
                  <strong><i class="fa fa-pencil margin-r-5"></i> Навички</strong>
                  <p>
                    <span class="label label-success"><?=$_SESSION['auchUsersSetings']['skills'];?></span>
                  </p>
                  <hr>
                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Примітка</strong>
                  <p><?=$_SESSION['auchUsersSetings']['note'];?></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary direct-chat direct-chat-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Чат</h3>
            <div class="box-tools pull-right">
              <a href="im"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;</a>
              <a href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
              <!--<span data-toggle="tooltip" title="3 Нові повідомлення" class="badge bg-light-blue">3</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
              <?php
                foreach($data as $row)
                { 
              ?>
              
              <?php if($_SESSION['auchUsersSetings']['id'] == $row['id_user_a']) { 
                $divConteiner = 'direct-chat-msg';
                $pullName = 'pull-left';
                $pullDate = 'pull-right';
               } else { 
                  $divConteiner = 'direct-chat-msg right';
                  $pullName = 'pull-right';
                  $pullDate = 'pull-left';
               } ?>
               <!-- Message. Default to the left -->
               <div class="<?=$divConteiner?>">
                <div class="direct-chat-info clearfix">
                  <a href="friend?id=<?=$row['id_user_a'];?>"><span class="direct-chat-name <?=$pullName;?>"><?=$row['name'];?></span></a>
                  <span class="direct-chat-timestamp <?=$pullDate;?>"><?=$row['data'];?></span>
                </div><!-- /.direct-chat-info -->
                <?php
                  $img = $row['ava'];
                  if (file_exists($img)) { ?>
                      <a href="friend?id=<?=$row['id_user_a'];?>"><img class="direct-chat-img" src="<?=$row['ava'];?>" alt="<?=$row['name'];?>"></a><!-- /.direct-chat-img -->
                  <?php
                  } else { ?>
                      <a href="friend?id=<?=$row['id_user_a'];?>"><img class="direct-chat-img" src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="<?=$row['name'];?>"></a><!-- /.direct-chat-img -->
                  <?php
                  }
                ?>
                <div class="direct-chat-text">
                  <?php
                    $phrases  = ['Хахаха', 'Хаха', 'Ха', 'Хуй', 'підар', 'Підар', 'Уйобок', 'козел', 'Козел', 'підарас', 'Підарас'];
                    $emojis   = ["\u{1F606}", "\u{1F600}", "\u{263A}", "\u{1F637}", "\u{1F637}", "\u{1F637}", "\u{1F637}", "\u{1F637}", "\u{1F637}", "\u{1F637}"];
                  ?>
                  <?=str_replace($phrases, $emojis, $row['text']);?>
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->
              <?php 
                } 
              ?>
              <div id="bms"></div>
            </div><!--/.direct-chat-messages-->
          </div><!-- /.box-body -->
          <div class="box-footer">
            <form action="" method="post">
              <div class="input-group">
                <input type="text" name="message" id="inputNewMess" placeholder="Повідомлення..." class="form-control">
                <span class="input-group-btn">
                  <button type="submit" name="newMessage" value="newMessage" class="btn btn-primary btn-flat">Відправити</button>
                </span>
              </div>
            </form>
          </div><!-- /.box-footer-->
        </div>
    </div><!-- /.col -->
  </div><!-- /.row -->

</section><!-- /.content -->
