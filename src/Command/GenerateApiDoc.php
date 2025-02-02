<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;
use Throwable;

#[AsCommand(name: 'doc:api')]
class GenerateApiDoc extends Command
{
    protected function configure(): void
    {
        $this->setDescription('Generate the API documentation');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $configRoutes = Yaml::parseFile(__DIR__ . '/../../config/routes.yaml');

            $doc = fopen('api-doc.md', 'w+');
            foreach ($configRoutes as $routeName => $route) {
                if ($routeName === 'controllers') {
                    continue;
                }
                fwrite(
                    $doc,
                    sprintf(
                        '# %s http://localhost:8000/%s %s',
                        $route['methods'],
                        $route['path'],
                        PHP_EOL
                    )
                );
                fwrite($doc, sprintf('%s %s %s', $this->getRouteDescription($route), PHP_EOL, PHP_EOL));

                if ($route['methods'] === 'POST') {
                    fwrite($doc, sprintf('body : %s %s', $this->getParamsDescription($route), PHP_EOL));
                }
                fwrite($doc, sprintf("%s %s %s", PHP_EOL, '---', PHP_EOL));
            }
            fclose($doc);

            $output->writeln("Doc generated !");


            return Command::SUCCESS;
        } catch (Throwable $e) {
            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }
    }

    private function getRouteDescription(array $route): string
    {
        $controller = explode('::', $route['controller'])[0];
        $description = '???';
        if (method_exists($controller, 'getDescription')) {
            $description = $controller::getDescription();
        }

        return $description;
    }

    private function getParamsDescription(array $route): string
    {
        $controller = explode('::', $route['controller'])[0];
        $params = '???';
        if (method_exists($controller, 'getParams')) {
            $params = $controller::getParams();
        }

        return $params;
    }
}