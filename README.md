# Крон для сбора и подсчета статистики

* UpdateDirectStatisticsShell
Загружает `clicks`, `views`, `cost` из API Яндекса в таблицы `campaign_statistics_daily` и `campaign_statistics_hourly`.
Запускается ежечасно, чтобы поддерживать статистику в актуальном состоянии.

* UpdateDirectStatisticsDetalizedShell (1:30)
Ежедневно загружает статистику из API Яндекса параметры `clicks`, `views`, `cost` для каждой группы объявлений и ключевого слова, и сохраняет их в `ad_group_statistics_daily` и `keyword_statistics_daily` соответственно.

* AggregateLeadsStatisticsShell (2:00)
Заполняет поля `calls`, `emails`, `leads` из таблиц `site_calls` и `site_emails` в таблицы
`campaign_statistics_daily`, `ad_group_statistics_daily` и `keyword_statistics_daily`.

* AggregateKeywordsStatisticsShell (2:01)
Заполняет расчетные значения (CTR и др.) для статистики ключевых фраз.

* AggregateAdGroupsStatisticsShell (2:02)

* AggregateCampaignsStatisticsShell (2:03)

* AggregateSitesStatisticsShell (2:04)
Заполняет таблицу статистики сайтов `site_statistics_daily` из таблицы статистики кампаний `campaign_statistics_daily`.
(поля `clicks`, `views`, `cost`), из таблицы `site_calls` (поле `calls`), `site_emails` (поле `emails`),
`site_orders` (поле `orders`). Остальные поля рассчитываются.

* AggregateProjectsStatisticsShell (2:06)
Заполняет таблицу `project_statistics_daily` из таблицы `site_statistics_daily`

## Сборка файла с документацией

Install `aglio`
Run `aglio -o src/Template/Docs/index.ctp -i api-docs.apib --theme-template ./kaiten-tuned.jade`


## Новые кроны

* UpdateCampaignsStatistics - проходит по всем источникам и запускает метод updateCampaignsDailyStatistics, который загружает суточную сводку по кампаниям и сохраняет в таблицы статистики кампаний;
* SyncSources
 	* all - для каждого источника запускает syncCampaigns, таким образом синхронизируя кампании, группы объявлений, ключевые слова и прочие данные с соответствущими значениями на сервере;
*
