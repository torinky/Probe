<?php

namespace App\Shell;

use Cake\Console\Shell;

/**
 * Servers shell command.
 * @property \App\Model\Table\ServersTable $Servers
 */
class ServersShell extends Shell
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Servers');
    }

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->out('hello!');
        $this->out($this->OptionParser->help());
    }

    public function updateLog()
    {
        if ($this->Servers->addLogs() === false) {
            $data = $this->Servers->getDefaultSet();
            $this->Servers->save($data);
        }
    }

}
