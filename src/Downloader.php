<?php

declare(strict_types=1);

namespace ColinODell\AOCDownloader;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;
use League\HTMLToMarkdown\HtmlConverter;
use League\HTMLToMarkdown\HtmlConverterInterface;
use Symfony\Component\DomCrawler\Crawler;

final class Downloader
{
    private ClientInterface $client;
    private HtmlConverterInterface $htmlConverter;

    public function __construct(string $sessionId)
    {
        $this->client = new Client([
            'base_uri' => 'https://adventofcode.com/',
            'cookies' => true,
        ]);

        $jar = $this->client->getConfig('cookies');
        \assert($jar instanceof CookieJar);
        $jar->setCookie(SetCookie::fromString('session=' . $sessionId . '; Domain=adventofcode.com'));

        $this->htmlConverter = new HtmlConverter();
    }

    public function getInput(int $year, int $day): string
    {
        return (string) $this->client->get(\sprintf('%d/day/%d/input', $year, $day))->getBody();
    }

    public function getPuzzleAsMarkdown(int $year, int $day): string
    {
        $html = (string) $this->client->get(\sprintf('%d/day/%d', $year, $day))->getBody();

        $puzzles = [];

        $crawler = new Crawler($html);
        foreach ($crawler->filter('.day-desc') as $part) {
            $innerHtml = '';
            foreach ($part->childNodes as $child) {
                $innerHtml .= $child->ownerDocument->saveHTML($child);
            }

            $puzzles[] = $this->htmlConverter->convert($innerHtml);
        }

        return \implode("\n\n-----\n\n", $puzzles);
    }
}
