<script lang="ts">
export default {}
</script>
<template>
  <header class="flex flex-col hscreenh justify-center items-center text-white">
    <h1 class="headers text-5xl">HeliCraft</h1>
    <h2 class="text-lg">Правила сервера</h2>
  </header>
  <main class="flex bg-violet-800 w-full text-white justify-center items-center text-lg">
    <ol>
      <li>
        <b>Раздел 1. Общие положения.</b>
        <ol>
          <li>Сервер предоставляет услуги по принципу "Как есть".</li>
          <li>
            Любой игрок можнет быть заблокирован на сервере в любой момент, без объяснения причин.
          </li>
          <li>
            На сервере могут происходить любые обновления, сбои, с последствиями вплоть до полного
            уничтожения прогресса данных игроков, и сервер не обязан возмещать/восстанавливать
            какие-либо ресурсы
          </li>
          <li>
            Наказание выдается исходя из оценки ситуации администрацией, правила являются лишь
            ориентиром для выдачи наказания.
          </li>
          <li>
            Правила могут быть изменены в любой момент, без уведомления от администрации. Если игрок
            не согласен с новыми правилами он обязан прекратить игру на сервере в соответсвии с п.п.
            1.7.
          </li>
          <li>Все жалобы должны быть поданы и рассмотрены в соответствии с разделом правил 4</li>
          <li>
            Любой игрок, играющий на сервере полностью и безоговорочно согласен с правилами и
            действиями администрации
            <ol>
              <li>Незнание правил не освобождает от ответственности</li>
            </ol>
          </li>
          <li>Ответственность за игровой аккаунт несет только сам игрок</li>
          <li>
            Все блокировки аккаунтов выдаются по IP-адресу. В случае, если один IP-адрес
            используется несколькими игроками, блокировка накладывается на всех игроков
          </li>
          <li>
            За нарушение любого из пункта правил из раздела 2(Тяжкие нарушения), кроме указанного
            наказания, также может произойти: очистка инвенторя, уничтожение прогресса, построек
            игрока.
          </li>
          <li>
            Администрация может выдать разрешение на НЕисполнение всех правил, кроме правил из
            раздела 2. Правила из раздела 2 обязательны для всех.
          </li>
        </ol>
      </li>
      <li>
        <b>Раздел 2. Тяжкие нарушения</b>
        <ol>
          <li>
            Гриферство в любых его проявлениях(воровство, поломка и т.п.) наказывается:
            <ol>
              <li>В лёгкой форме: блокировка игрового аккаунта от 1-го дня до 2-х недель</li>
              <li>В средней форме: блокировка IP адресса от 1-ой недели до 7-х месяцев</li>
              <li>
                В критической форме: блокировка IP адресса от 2-х месяцев до перманентной
                блокировки, а также полного удаления игрового аккаунта
              </li>
              <li>Повторное нарушение(в любой форме) классифицируется как критическая форма</li>
            </ol>
          </li>
          <li>
            Использование программ, позволяющих получить приеемущество, над другими игроками, или
            изменить игровой процесс(причинение вреда серверу должно наказываться по п.п. 2.3)
            наказывается:
            <ol>
              <li>
                При отсутствии ущерба для игроков, и серьёзного влияния на игровой процесс:
                блокировка игрового аккаунта от 1-го дня до 4-х недель
              </li>
              <li>
                При небольшом ущербе для игроков, и небольшом влиянии на игровой процесс: блокировка
                IP адресса от 2-х недель до 8-х месяцев
              </li>
              <li>
                При большом ущербе для игроков и серьезном влиянии на игровой процесс: блокировка IP
                адресса от 2-х месяцев до перманентной блокировки, а также полного удаления игрового
                аккаунта
              </li>
              <li>
                При повторном нарушении(в любой форме) классифицируется как критическая
                форма(большой ущерб)
              </li>
            </ol>
          </li>
          <li>
            Нанесение вреда серверу/Угроза нанесения вреда серверу в любой форме наказывается:
            <ol>
              <li>
                При словесной угрозе нанесения вреда серверу:
                <ol>
                  <li>
                    При угрозе в лёгкой форме(простая словесная угроза, без употребления ругательств
                    и т.п. прочего): блокировка игрового чата от 2-х часов до 7-ми дней
                  </li>
                  <li>
                    При угрозе в тяжелой форме(с применением шантажа, парралельным нарушением других
                    п.п. и пр.): блокировка игрового аккаунта или блокировка IP адресса от 1-го дня
                    до перманентной блокировки
                  </li>
                </ol>
              </li>
              <li>
                При создании угрозы вреда серверу своими действиями:
                <ol>
                  <li>
                    При создании небольшой угрозы: блокировка игрового аккаунта от 1-го дня до 4-х
                    недель
                  </li>
                  <li>
                    При создании большой угрозы: блокировка IP адресса от 2-х недель до 8-х месяцев
                    или перманентная блокировка
                  </li>
                </ol>
              </li>
              <li>
                При повторном нарушении(в любой форме) классифицируется как самая критическая форма
              </li>
            </ol>
          </li>
          <li>
            Использование уязвимостей сервера для получения выгоды и/или их утаивание от
            администрации карается перманентной блокировкой IP адреса
          </li>
          <li>
            Нарушение любого законодательства государства, в котором физически распологается
            сервер/а(Российская Федерация) запрещено, и наказывается перманентной блокировкой, без
            права разблокировки. Сервер пытается предотвратить любые нарушения законодательства,
            всеми возможными способами со своей стороны, однако, при нарушении законодательства на
            сервере, ответственность несет сам игрок, а не сервер
          </li>
          <li>
            Нарушение любого законодательства страны резиденства игрока, а также его настоящего
            местоположения запрещено и наказывается перманентной блокировкой, без права
            разблокировки. Сервер пытается предотвратить любые нарушения законодательства, всеми
            возможными способами со своей стороны, однако, при нарушении законодательства на
            сервере, ответственность несет сам игрок, а не сервер
          </li>
          <li>
            Обход любых блокировок на сервере наказывается блокирокой известных IP адресов данного
            аккаунта
          </li>
        </ol>
      </li>
      <li>
        <b>Раздел 3. Обычные нарушения</b>
        <ol>
          <li>
            Использование нескольких аккаунтов(твинков) наказывается блокировкой IP адреса на срок
            от 1-ой недели до 2-х месяцев, а также блокировкой всех НЕосновных аккаунтов
          </li>
          <li>
            Выдача себя за другого игрока наказывается:
            <ol>
              <li>При отсутствии ущерба: блокировкой чата от 2-х часов до 7-ми дней</li>
              <li>
                При небольшом и среднем ущербе: блокировкой IP-адреса от 2-х часов до 2-х месяцев
              </li>
              <li>
                При выдаче себя за админа, а также при большом ущербе классифицируется как п.п. 2.3.
              </li>
              <li>
                При повторном нарушении(в любой форме) классифицируется как самая критическая форма
              </li>
            </ol>
          </li>
        </ol>
      </li>
      <li>
        <b>Раздел 4. Правила чата</b>
        <ol>
          <li>
            Любые высказывания/разговоры на политические темы запрещены - Наказание за нарушение:
            мут от 30 дней до перманентного бана
          </li>
          <li>
            Мат запрещен(в т.ч. завуалированный) - Наказание за нарушение: мут от 30 минут до
            перманентного бана
          </li>
          <li>
            Любые разговоры/высказывания на темы 18+ запрещены - Наказание за нарушение: мут от 30
            дней до перманентного бана
          </li>
          <li>
            Любая дискриминация любых людей/групп людей/животных по любому признаку запрещена -
            Наказание за нарушение: мут от 30 дней до перманентного бана
          </li>
          <li>
            Любые проявления нацизма запрещены - Наказание за нарушение: мут от 60 дней до
            перманентного бана
          </li>
          <li>
            Настраивание игроков против администрации, неадекватная критика действий администрации -
            Наказание за нарушение: мут от 2х дней до перманентного бана
          </li>
          <li>
            Любые оскорбления, в адрес любых игроков/животных/людей(даже не связанных с проектом)
            -Наказание за нарушение: мут от 2х дней до перманентного бана
          </li>
          <li>
            Любая реклама других серверов/ресурсов запрещена - Наказание за нарушение: мут от 2х
            дней до перманентного бана
          </li>
          <li>
            Пропаганда агрессии запрещена - Наказание за нарушение: мут от 1 часа до перманентного бана
          </li>
        </ol>
      </li>
    </ol>
  </main>
</template>
<style scoped>
main {
  padding-top: 20px !important;
  padding-bottom: 20px !important;
}
.hscreenh {
  height: 95vh;
}
ol {
  counter-reset: item;
  padding-left: 0;
  margin-left: 20px;
}

li {
  margin: 5px 0;
  list-style-type: none;
}

li::before {
  counter-increment: item;
  content: counters(item, '.') '. ';
}
</style>
