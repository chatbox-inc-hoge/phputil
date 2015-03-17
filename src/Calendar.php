<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/16
 * Time: 2:24
 */

namespace Chatbox;

use Carbon\Carbon;

/**
 *
 * $cal = new Calendar;
 *
 * $get
 *
 *
 * Class Calendar
 * @package Chatbox
 *
 *
 *
 */
class Calendar {

    const SUNDAY    = 0;
    const MONDAY    = 1;
    const TUESDAY   = 2;
    const WEDNESDAY = 3;
    const THURSDAY  = 4;
    const FRIDAY    = 5;
    const SATURDAY  = 6;

    /**
     * Names of days of the week.
     *
     * @var array
     */
    protected static $days = array(
        self::SUNDAY => 'Sunday',
        self::MONDAY => 'Monday',
        self::TUESDAY => 'Tuesday',
        self::WEDNESDAY => 'Wednesday',
        self::THURSDAY => 'Thursday',
        self::FRIDAY => 'Friday',
        self::SATURDAY => 'Saturday'
    );


    protected $leftHandWeekDay=0;
    /**
     * @var Carbon
     */
    protected $startOn;
//    protected $year = 2015;
//    protected $month = 2;
//    protected $day = 1;

    public function __construct($year,$month=null)
    {
        $carbon = ($year instanceof Carbon)?$year:Carbon::create($year,$month,1);
        $this->startOn($carbon);
//        $this->year = $year;
//        $this->month = $month;
    }

    public function startOn(Carbon $carbon){
        $this->startOn = $carbon->startOfDay();
    }

    public function leftHandWeekDay($weekday){
        if(isset(static::$days[$weekday])){
            $this->leftHandWeekDay = $weekday;
        }else{
            throw new \Exception("argument must be considered as WeekDay number");
        }
    }

    /**
     * Carbonオブジェクトの一覧を取得
     * @param
     * @return Carbon[]
     */
    public function getCarbons($length=null){
        $startOn = $this->getStartOn();
        $endOn = $this->getEndOn();

        $pool = [];
        while($startOn <= $endOn){
            $pool[] = $startOn->copy()->startOfDay();
            $startOn->addDay();
        }
        return $pool;
    }

    protected function getStartOn(){
        $startON = $this->startOn->copy();
        if($startON->dayOfWeek !== $this->leftHandWeekDay){
            $startON->modify("last ".static::$days[$this->leftHandWeekDay]);
        }
        return $startON->startOfDay();
    }
    protected function getEndOn($length = null){
        $endOn   = $this->startOn->copy()->endOfMonth();
        if($endOn->dayOfWeek !== $this->rightHandWeekDay()){
            $endOn->modify("next ".static::$days[$this->rightHandWeekDay()]);
        }
        return $endOn->startOfDay();
    }

    protected function rightHandWeekDay(){
        $rightHandWeekDay = $this->leftHandWeekDay - 1;
        if($rightHandWeekDay < 0){
            $rightHandWeekDay = static::SATURDAY;
        }
        return $rightHandWeekDay;
    }

    public function toArray(){

    }

} 