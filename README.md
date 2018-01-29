# Крон для сбора и подсчета статистики

* UpdateDirectStatisticsShell
Загружает `clicks`, `views`, `cost` из API Яндекса в таблицы `campaign_statistics_daily` и `campaign_statistics_hourly`.
Запускается ежечасно, чтобы поддерживать статистику в актуальном состоянии.

* UpdateDirectStatisticsDetalizedShell (1:30)
Ежедневно загружает статистику из API Яндекса параметры `clicks`, `views`, `cost` для каждой группы объявлений и ключевого слова, и сохраняет их в `ad_group_statistics_daily` и `keyword_statistics_daily` соответственно.

* AggregateLeadsStatisticsShell (2:00)
Заполняет поля `calls`, `emails`, `leads` во всех таблицах статистики из таблиц `site_calls` и `site_emails`.

* AggregateKeywordsStatisticsShell (2:01)
Заполняет расчетные значения (CTR и др.) для статистики ключевых фраз.

* AggregateAdGroupsStatisticsShell (2:02)

* AggregateCampaignsStatisticsShell (2:03)

* AggregateSitesStatisticsShell (2:04)
Заполняет таблицу статистики сайтов `site_statistics_daily` из таблицы статистики кампаний `campaign_statistics_daily`.
Поля `clicks`, `views`, `cost`, `calls`, `emails` берутся из указанной таблицы, а поле `orders` - из таблицы `site_orders`.


## Сборка файла с документацией

Install `aglio`
Run `aglio -o src/Template/Docs/index.ctp -i api-docs.apib --theme-template ./kaiten-tuned.jade`
