<?php

namespace MikeyMike\CliMenu\MenuItem;

/**
 * Class LineBreakItem
 * @author Michael Woodward <michael@wearejh.com>
 */
class LineBreakItem implements MenuItemInterface
{
    /**
     * @var string
     */
    private $breakChar;

    /**
     * @var int
     */
    private $lines;

    /**
     * Initialise text item
     *
     * @param string $breakChar
     * @param int    $lines
     */
    public function __construct($breakChar = ' ', $lines = 1)
    {
        $this->breakChar = $breakChar;
        $this->lines     = $lines;
    }

    /**
     * The output text for the item
     *
     * @param int $menuWidth
     * @return array
     */
    public function getRows($menuWidth)
    {
        return explode(
            "\n",
            rtrim(str_repeat(sprintf("%s\n", str_repeat($this->breakChar, $menuWidth)), $this->lines))
        );
    }

    /**
     * Can the item be selected
     *
     * @return bool
     */
    public function canSelect()
    {
        return false;
    }

    /**
     * Execute the items callable if required
     *
     * @return callable|void
     */
    public function getSelectAction()
    {
        return;
    }

    /**
     * Return the raw string of text
     *
     * @return string
     */
    public function getText()
    {
        return $this->breakChar;
    }
}
