# Крон для сбора и подсчета статистики

1. UpdateDirectStatisticsShell
Загружает `clicks`, `views`, `cost` из API Яндекса в таблицы `campaign_statistics_daily` и `campaign_statistics_hourly`.

2. UpdateDirectStatisticsDetalizedShell
Ежедневно загружает статистику из API Яндекса параметры `clicks`, `views`, `cost` для каждой группы объявлений и ключевого слова, и сохраняет их в `ad_group_statistics_daily` и `keyword_statistics_daily` соответственно.

3. AggregateLeadsStatisticsShell
Заполняет поля `calls`, `emails`, `leads` во всех таблицах статистики из таблиц `site_calls` и `site_emails`.

4. AggregateSitesStatisticsShell
Заполняет таблицу статистики сайтов `site_statistics_daily` из таблицы статистики кампаний `campaign_statistics_daily`.
Поля `clicks`, `views`, `cost`, `calls`, `emails` берутся из указанной таблицы, а поле `orders` - из таблицы `site_orders`.


## Сборка файла с документацией

Install `aglio`
Run `aglio -o src/Template/Docs/index.ctp -i api-docs.apib --theme-template ./kaiten-tuned.jade`
