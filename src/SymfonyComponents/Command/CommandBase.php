<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2014/12/02
 * Time: 10:55
 */
namespace Chatbox\SymfonyComponents\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Illuminate\Database\Capsule\Manager as Capsule;



abstract class CommandBase extends Command{

    protected $config;
    /**
     * @var InputInterface
     */
    private $input;
    /**
     * @var OutputInterface
     */
    private $output;

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
        try{
            $this->handle();
        }catch (\Exception $e){
            $this->handleError($e);
            exit(1);
        }
    }

    abstract protected function handle();

    protected function handleError(\Exception $e){
        throw $e;
    }

    /**
     * @return InputInterface
     */
    protected function getInput()
    {
        return $this->input;
    }

    protected function getOption($name){
        return $this->input->getOption($name);
    }

    protected function getArgument($name){
        return $this->input->getArgument($name);
    }

    /**
     * @return OutputInterface
     */
    protected function getOutput()
    {
        return $this->output;
    }

    /**
     * @return OutputInterface
     */
    protected function line($message)
    {
        return $this->output->writeln($message);
    }

    /**
     * @param InputInterface $input
     * @return Config
     */
    protected function getConfig($inputKey){
        if(is_null($this->config)){
            $this->config = $this->loadConfig($inputKey);
        }
        return $this->config;
    }

    protected function loadConfig($inputKey){
        $path = $this->input->getOption($inputKey);
        if(class_exists('\Symfony\Component\Filesystem\Filesystem()')){
            $fs = new \Symfony\Component\Filesystem\Filesystem();
            ($fs->isAbsolutePath($path)) || $path = getcwd()."/$path";
        }else{
            $path = getcwd()."/$path";
        }
        if(file_exists($path)){
            return include $path;
        }else{
            throw new \Exception("cant find configuration file $path");
        }
    }
}