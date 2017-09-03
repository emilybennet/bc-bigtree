<?
    $scheduleMod = new scheduledEvents();
    $events = $scheduleMod->getEventsCalendar();

    $Parsedown = new Parsedown();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>BronyCon Schedule</title>
        <link rel="stylesheet" href="/css/grid/qtip.css">
        <link rel="stylesheet" href="/css/grid/grid.css">
    </head>
    <body>

        <section id="events-schedule" class="mega-schedule">
            <? foreach ($events as $conday): ?>
                <header class="schedule-day">
                    <h2><?=date("l, F j, Y",strtotime($conday['day_begins']))?></h2>
                </header>

                <header class="schedule-structure">
                    <section class="column time-scale"></section>

                    <? foreach ($conday["locations"] as $loc): ?>
                        <? if ($loc['location_name'] == "Harmony Plaza - Stabletop Games"): ?>
                            <section class="column room" style="min-width:450px;">
                        <? else: ?>
                            <section class="column room">
                        <? endif; ?>
                                <?=$loc['location_name']?>
                                <small><?=$loc['bcc_room_number']?></small>
                            </section>
                    <? endforeach; ?>
                </header>

                <div class="schedule-structure event-things">
                    <section class="column time-scale">
                        <ul class="time-slots">
                            <? for ($i = 0; $i < $conday['totalHours']; $i++): ?>
                                <li class="time-slot">
                                    <?=date('ga',strtotime($conday['day_begins'])+3600*$i)?>
                                </li>
                                <li class="time-slot"></li>
                            <? endfor; ?>
                        </ul>
                    </section>

                    <? foreach ($conday["locations"] as $loc): ?>
                        <? if ($loc['location_name'] == "Harmony Plaza - Stabletop Games"): ?>
                            <section class="column room" style="min-width:450px;">
                        <? else: ?>
                            <section class="column room">
                        <? endif; ?>
                                <ul class="time-slots">
                                    <? for ($i = 0; $i < $conday['totalHours']*2; $i++): ?>
                                        <li class="time-slot"></li>
                                    <? endfor; ?>
                                </ul>
                        <? foreach ($loc['events'] as $eId => $ev): ?>

                            <?
                                $desc = $ev['description'];

                                if ($ev['fee']) {
                                    $desc .= "\n\n $".$ev['fee']." entry fee.";
                                }
                                if ($ev['space_limited']) {
                                    $desc .= " Space limited.";
                                }

                                if ($ev['mature'] == 1) {
                                    $desc .= "\n\n &Up (21+) only. ID required.";
                                }
                                if ($ev['location_name'] == "Crusaders' Clubhouse") {
                                    $desc .= "\n\n Kids & famlies only!";
                                }
                            ?>

                            <div class="event event-tooltip"
                                style="top:<?=$ev['percentFromTop']?>%;
                                      height:<?=$ev['eventBlockHeight']?>%;
                                      width:<?= floor( (1 / $ev['numColumns']) * 100 ) ?>%;
                                      left:<?= ($ev['leftIndex'] * (1 / $ev['numColumns']) * 100) ?>%;
                                      background-color:#C3DAE5;"
                                data-event-name="<?=$ev['event_name']?>"
                                data-start-time="<?=date("n/j/Y g:i a",strtotime($ev['start_time']))?>"
                                data-end-time="<?=date("n/j/Y g:i a",strtotime($ev['end_time']))?>"
                                data-location="<?=$ev['location_name']?>"
                                data-description="<?=htmlspecialchars($Parsedown->text($desc))?>">
                                    <span class="event-name"><?=$ev['event_name']?></span>
                                    <? if ($ev['mature']): ?>
                                        <span class="event-track"
                                            style="background:#F0641E;"
                                            title="&Up (21+) only. ID required."></span>
                                    <? endif; ?>
                                    <? if ($ev['location_name'] == "Crusaders' Clubhouse"): ?>
                                        <span class="event-track"
                                            style="background:#37559B;"
                                            title="Kids & famlies only!"></span>
                                    <? endif; ?>
                                    <? if ($ev['fee']): ?>
                                        <span class="event-track"
                                            style="background:#FFC30F;"
                                            title="$<?=$ev['fee']?> entry fee."></span>
                                    <? endif; ?>
                            </div>
                        <? endforeach; ?>
                        </section>
                    <? endforeach; ?>

                </div>

            <? endforeach; ?>
        </section>

        <script src="/js/jquery.js"></script>
        <script src="/js/vendor/jquery.qtip.js"></script>

        <script>
            $(function() {
                $(".time-block li, .event-tooltip").each(function(){

                  popoverContent = "";
                  popoverContent += $(this).data("description");
                  popoverContent += "Location: "+$(this).data("location")+"<br/>";
                  popoverContent += "Start Time: "+$(this).data("start-time")+"<br/>";
                  popoverContent += "End Time: "+$(this).data("end-time");

                  $(this).qtip({
                      content: {
                        text: popoverContent,
                        title: {
                          text: $(this).data("event-name"),
                          button: true
                        }
                      },
                      style: 'qtip-dark',
                      position: {
                          my: 'bottom center',
                          at: 'top center',
                          viewport: $(window),
                          adjust: {
                            method: 'flip flip'
                          }
                        },
                      show: 'click',
                      hide: 'unfocus'
                    });
                });
            });
        </script>

    </body>
</html>
