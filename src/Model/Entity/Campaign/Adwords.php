<?php
namespace App\Model\Entity\Campaign;

use Cake\ORM\TableRegistry;

use App\Utility\ReportParser;

use Google\AdsApi\AdWords\AdWordsSession;
use Google\AdsApi\AdWords\AdWordsSessionBuilder;
use Google\AdsApi\AdWords\v201705\cm\ReportDefinitionReportType;
use Google\AdsApi\AdWords\Reporting\v201705\DownloadFormat;
use Google\AdsApi\AdWords\Reporting\v201705\ReportDownloader;
use Google\AdsApi\AdWords\ReportSettingsBuilder;
use Google\AdsApi\Common\Configuration;
use Google\AdsApi\Common\OAuth2TokenBuilder;

class Adwords extends \App\Model\Entity\Campaign
{
    protected $session;

    public function getTypeHuman()
    {
        return 'Кампания Google Adwords';
    }

    public function getSession()
    {
        if (!empty($this->session)) {
            return $this->session;
        }

        $configuration = $this->getConfiguration();

        $oAuth2Credential = (new OAuth2TokenBuilder())
            ->from($configuration)
            ->build();

        $this->session = (new AdWordsSessionBuilder())
            ->from($configuration)
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        return $this->session;
    }

    public function loadStatisticsReport($fields, $period, $perfomance = ReportDefinitionReportType::CAMPAIGN_PERFORMANCE_REPORT)
    {
        $reportQuery = sprintf('SELECT %s FROM %s DURING %s', join(',', $fields), $perfomance, $period);

        $reportDownloader = new ReportDownloader($this->getSession());
        $reportSettingsOverride = (new ReportSettingsBuilder())
            //->includeZeroImpressions(false)
            ->build();

        $reportDownloadResult = $reportDownloader->downloadReportWithAwql($reportQuery, DownloadFormat::CSV, $reportSettingsOverride);

        return ReportParser::parseCsv($reportDownloadResult->getAsString(), ['col_delimiter' => ',']);
    }

    protected function getConfiguration()
    {
        return new Configuration([
            'ADWORDS' => [
                'developerToken' => $this->credential->token,
                'clientCustomerId' => $this->credential->rel_id,
            ],
            'OAUTH2' => json_decode($this->credential->token2, true),
        ]);
    }
}
