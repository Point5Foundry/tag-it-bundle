<?php
/**
 * Script for composer, to symlink bootstrap lib into Bundle
 *
 * Maybe nice to convert this to a command and then reuse command in here.
 */
namespace Mopa\Bundle\BootstrapBundle\Composer;

use Composer\Script\Event;
use Mopa\Bridge\Composer\Util\ComposerPathFinder;
use Pff\Bundle\TagItBundle\Command\SymlinkTagItCommand;

class ScriptHandler
{

    public static function postInstallSymlinkTagIt(Event $event)
    {
        $IO = $event->getIO();
        $composer = $event->getComposer();
        $cmanager = new ComposerPathFinder($composer);
        $options = array(
            'targetSuffix' => DIRECTORY_SEPARATOR . "Resources" . DIRECTORY_SEPARATOR . "tag-it",
            'sourcePrefix' => '..' . DIRECTORY_SEPARATOR
        );
        list($symlinkTarget, $symlinkName) = $cmanager->getSymlinkFromComposer(
            SymlinkTagItCommand::$pffTagItBundleName,
            SymlinkTagItCommand::$tagItName,
            $options
        );

        $IO->write("Checking Symlink", FALSE);
        if (false === SymlinkTagItCommand::checkSymlink($symlinkTarget, $symlinkName, true)) {
            $IO->write("Creating Symlink: " . $symlinkName, FALSE);
            SymlinkTagItCommand::createSymlink($symlinkTarget, $symlinkName);
        }
        $IO->write(" ... <info>OK</info>");
    }
}