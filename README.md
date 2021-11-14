# Advent of Code Downloader

[![License](https://img.shields.io/github/license/colinodell/aoc-downloader?style=flat-square)](https://github.com/colinodell/aoc-downloader/blob/main/LICENSE.md)
[![Supported PHP Versions](https://img.shields.io/packagist/php-v/colinodell/aoc-downloader?style=flat-square)](https://packagist.org/packages/colinodell/aoc-downloader)
[![Packagist Version](https://img.shields.io/packagist/v/colinodell/aoc-downloader?style=flat-square)](https://packagist.org/packages/colinodell/aoc-downloader)
[![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/colinodell/aoc-downloader/CI/main?style=flat-square)](https://github.com/colinodell/aoc-downloader/actions/workflows/ci.yml)

Simple PHP-based utility to download all [Advent of Code](https://adventofcode.com/) puzzles and inputs locally.

## Requirements

This project requires PHP 7.4 or higher.

## Installation

```bash
git clone https://github.com/colinodell/aoc-downloader.git
cd aoc-downloader
composer update -o --no-dev
```

## Usage

You'll need to log into <adventofcode.com> and grab your `session` cookie using your browser's dev tools:

![](session-cookie.png)

You can then pass that as an argument to this utility:

```
Usage:
  ./bin/aoc-downloader [options] [--] <session_id>

Arguments:
  session_id            Session ID (from the adventofcode.com `session` cookie

Options:
  -o, --output=OUTPUT   The directory to save the downloaded files [default: "./output"]
  -y, --year=YEAR       The year to download puzzles for (default is all years)
  -h, --help            Display help for the given command. When no command is given display help for the ./bin/download.php command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```
