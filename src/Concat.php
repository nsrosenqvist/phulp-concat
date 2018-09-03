<?php namespace NSRosenqvist\Phulp;

use Phulp\DistFile;
use Phulp\Source;

class Concat implements \Phulp\PipeInterface
{
    private $filename;
    private $newline;

    public function __construct(string $filename, bool $newline = false)
    {
        $this->filename = $filename;
        $this->newline = $newline;
    }

    public function execute(Source $src)
    {
        $content = '';

        foreach ($src->getDistFiles() as $key => $file) {
            $content .= $file->getContent().($this->newline ? PHP_EOL : '');
            $src->removeDistFile($key);
        }

        $src->addDistFile(new DistFile($content, $this->filename));
    }
}
