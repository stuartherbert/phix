<?php

/**
 * Copyright (c) 2011 Stuart Herbert.
 * Copyright (c) 2010 Gradwell dot com Ltd.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of the
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package     Phix_Project
 * @subpackage  PhixSwitches
 * @author      Stuart Herbert <stuart@stuartherbert.com>
 * @copyright   2011 Stuart Herbert. www.stuartherbert.com
 * @copyright   2010 Gradwell dot com Ltd. www.gradwell.com
 * @license     http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link        http://www.phix-project.org
 * @version     @@PACKAGE_VERSION@@
 */

namespace Phix_Project\PhixSwitches;
use Phix_Project\CommandLineLib\DefinedSwitches;
use Phix_Project\ValidationLib\MustBeValidPath;

class PhixSwitches
{
        static public function buildSwitches()
        {
                $switches = new DefinedSwitches();

                // phix -h || phix -?
                $switches->addSwitch('shortHelp', 'display a summary of the command-line structure')
                         ->setWithShortSwitch('h')
                         ->setWithShortSwitch('?');

                // phix --help || phix --?
                $switches->addSwitch('longHelp', 'display a full list of supported commands')
                         ->setWithLongSwitch('help')
                         ->setWithLongSwitch('?');
                
                // phix -v || phix --version
                $switches->addSwitch('version', 'display phix version number')
                         ->setWithShortSwitch('v')
                         ->setWithLongSwitch('version');

                // phix -d || phix --debug
                $switches->addSwitch('debug', 'enable debugging output')
                         ->setWithShortSwitch('d')
                         ->setWithLongSwitch('debug');

                // phix -I<path> || phix --include=<path>
                $switches->addSwitch('include', 'add a folder to load commands from')
                         ->setLongDesc("phix finds all of its commands by searching PHP's include_path for PHP files in "
                                        . "folders called 'PhixCommands'. If you want to phix to look in other folders "
                                        . "without having to add them to PHP's include_path, use --include to tell phix "
                                        . "to look in these folders."
                                        . \PHP_EOL . \PHP_EOL
                                        . "phix expects '<path>' to point to a folder that conforms to the PSR0 standard "
                                        . "for autoloaders."
                                        . \PHP_EOL . \PHP_EOL
                                        . "For example, if your command is the class '\Me\Tools\PhixCommands\ScheduledTask', phix would "
                                        . "expect to autoload this class from the 'Me/Tools/PhixCommands/ScheduledTask.php' file."
                                        . \PHP_EOL . \PHP_EOL
                                        . "If your class lives in the './myApp/lib/Me/Tools/PhixCommands' folder, you would call phix "
                                        . "with 'phix --include=./myApp/lib'")
                         ->setWithShortSwitch('I')
                         ->setWithLongSwitch('include')
                         ->setWithRequiredArg('<path>', 'The path to the folder to include')
                         ->setArgValidator(new MustBeValidPath())
                         ->setSwitchIsRepeatable();

                // all done!
                return $switches;
        }
}
