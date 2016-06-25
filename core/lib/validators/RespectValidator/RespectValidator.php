<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Respect\Validation;

use finfo;
use ReflectionClass;
use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Exceptions\ComponentException;
use Respect\Validation\Rules\AllOf;
use Respect\Validation\Rules\Key;

/**
 * @method static RespectValidator age(int $minAge = null, int $maxAge = null)
 * @method static RespectValidator allOf()
 * @method static RespectValidator alnum(string $additionalChars = null)
 * @method static RespectValidator alpha(string $additionalChars = null)
 * @method static RespectValidator alwaysInvalid()
 * @method static RespectValidator alwaysValid()
 * @method static RespectValidator arrayVal()
 * @method static RespectValidator arrayType()
 * @method static RespectValidator attribute(string $reference, Validatable $validator = null, bool $mandatory = true)
 * @method static RespectValidator bank(string $countryCode)
 * @method static RespectValidator bankAccount(string $countryCode)
 * @method static RespectValidator base()
 * @method static RespectValidator between(mixed $min = null, mixed $max = null, bool $inclusive = true)
 * @method static RespectValidator bic(string $countryCode)
 * @method static RespectValidator boolType()
 * @method static RespectValidator boolVal()
 * @method static RespectValidator bsn()
 * @method static RespectValidator call()
 * @method static RespectValidator callableType()
 * @method static RespectValidator callback(mixed $callback)
 * @method static RespectValidator charset(mixed $charset)
 * @method static RespectValidator cnh()
 * @method static RespectValidator cnpj()
 * @method static RespectValidator consonant(string $additionalChars = null)
 * @method static RespectValidator contains(mixed $containsValue, bool $identical = false)
 * @method static RespectValidator countable()
 * @method static RespectValidator countryCode()
 * @method static RespectValidator currencyCode()
 * @method static RespectValidator cpf()
 * @method static RespectValidator creditCard()
 * @method static RespectValidator date(string $format = null)
 * @method static RespectValidator digit(string $additionalChars = null)
 * @method static RespectValidator directory()
 * @method static RespectValidator domain(bool $tldCheck = true)
 * @method static RespectValidator each(Validatable $itemValidator = null, Validatable $keyValidator = null)
 * @method static RespectValidator email()
 * @method static RespectValidator endsWith(mixed $endValue, bool $identical = false)
 * @method static RespectValidator equals(mixed $compareTo)
 * @method static RespectValidator even()
 * @method static RespectValidator executable()
 * @method static RespectValidator exists()
 * @method static RespectValidator extension(string $extension)
 * @method static RespectValidator factor(int $dividend)
 * @method static RespectValidator falseVal()
 * @method static RespectValidator file()
 * @method static RespectValidator filterVar(int $filter, mixed $options = null)
 * @method static RespectValidator finite()
 * @method static RespectValidator floatVal()
 * @method static RespectValidator floatType()
 * @method static RespectValidator graph(string $additionalChars = null)
 * @method static RespectValidator hexRgbColor()
 * @method static RespectValidator identityCard(string $countryCode)
 * @method static RespectValidator image(finfo $fileInfo = null)
 * @method static RespectValidator imei()
 * @method static RespectValidator in(mixed $haystack, bool $compareIdentical = false)
 * @method static RespectValidator infinite()
 * @method static RespectValidator instance(string $instanceName)
 * @method static RespectValidator intVal()
 * @method static RespectValidator intType()
 * @method static RespectValidator ip(mixed $ipOptions = null)
 * @method static RespectValidator iterable()
 * @method static RespectValidator json()
 * @method static RespectValidator key(string $reference, Validatable $referenceValidator = null, bool $mandatory = true)
 * @method static RespectValidator keyNested(string $reference, Validatable $referenceValidator = null, bool $mandatory = true)
 * @method static RespectValidator keySet(Key $rule)
 * @method static RespectValidator keyValue(string $comparedKey, string $ruleName, string $baseKey)
 * @method static RespectValidator languageCode(string $set)
 * @method static RespectValidator leapDate(string $format)
 * @method static RespectValidator leapYear()
 * @method static RespectValidator length(int $min = null, int $max = null, bool $inclusive = true)
 * @method static RespectValidator lowercase()
 * @method static RespectValidator macAddress()
 * @method static RespectValidator max(mixed $maxValue, bool $inclusive = true)
 * @method static RespectValidator mimetype(string $mimetype)
 * @method static RespectValidator min(mixed $minValue, bool $inclusive = true)
 * @method static RespectValidator minimumAge(int $age)
 * @method static RespectValidator multiple(int $multipleOf)
 * @method static RespectValidator negative()
 * @method static RespectValidator no($useLocale = false)
 * @method static RespectValidator noneOf()
 * @method static RespectValidator not(Validatable $rule)
 * @method static RespectValidator notBlank()
 * @method static RespectValidator notEmpty()
 * @method static RespectValidator notOptional()
 * @method static RespectValidator noWhitespace()
 * @method static RespectValidator nullType()
 * @method static RespectValidator numeric()
 * @method static RespectValidator objectType()
 * @method static RespectValidator odd()
 * @method static RespectValidator oneOf()
 * @method static RespectValidator optional(Validatable $rule)
 * @method static RespectValidator perfectSquare()
 * @method static RespectValidator pesel()
 * @method static RespectValidator phone()
 * @method static RespectValidator positive()
 * @method static RespectValidator postalCode(string $countryCode)
 * @method static RespectValidator primeNumber()
 * @method static RespectValidator prnt(string $additionalChars = null)
 * @method static RespectValidator punct(string $additionalChars = null)
 * @method static RespectValidator readable()
 * @method static RespectValidator regex(string $regex)
 * @method static RespectValidator resourceType()
 * @method static RespectValidator roman()
 * @method static RespectValidator scalarVal()
 * @method static RespectValidator sf(string $name, array $params = null)
 * @method static RespectValidator size(string $minSize = null, string $maxSize = null)
 * @method static RespectValidator slug()
 * @method static RespectValidator space(string $additionalChars = null)
 * @method static RespectValidator startsWith(mixed $startValue, bool $identical = false)
 * @method static RespectValidator stringType()
 * @method static RespectValidator subdivisionCode(string $countryCode)
 * @method static RespectValidator symbolicLink()
 * @method static RespectValidator tld()
 * @method static RespectValidator trueVal()
 * @method static RespectValidator type(string $type)
 * @method static RespectValidator uploaded()
 * @method static RespectValidator uppercase()
 * @method static RespectValidator url()
 * @method static RespectValidator version()
 * @method static RespectValidator videoUrl(string $service = null)
 * @method static RespectValidator vowel()
 * @method static RespectValidator when(Validatable $if, Validatable $then, Validatable $when = null)
 * @method static RespectValidator writable()
 * @method static RespectValidator xdigit(string $additionalChars = null)
 * @method static RespectValidator yes($useLocale = false)
 * @method static RespectValidator zend(mixed $validator, array $params = null)
 */
class RespectValidator extends AllOf
{
    protected static $factory;

    /**
     * @return Factory
     */
    protected static function getFactory()
    {
        if (!static::$factory instanceof Factory) {
            static::$factory = new Factory();
        }

        return static::$factory;
    }

    /**
     * @param Factory $factory
     */
    public static function setFactory($factory)
    {
        static::$factory = $factory;
    }

    /**
     * @param string $rulePrefix
     * @param bool $prepend
     */
    public static function with($rulePrefix, $prepend = false)
    {
        if (false === $prepend) {
            self::getFactory()->appendRulePrefix($rulePrefix);
        } else {
            self::getFactory()->prependRulePrefix($rulePrefix);
        }
    }

    /**
     * @param string $ruleName
     * @param array $arguments
     *
     * @return Validator
     */
    public static function __callStatic($ruleName, $arguments)
    {
        if ('allOf' === $ruleName) {
            return static::buildRule($ruleName, $arguments);
        }

        $validator = new static();

        return $validator->__call($ruleName, $arguments);
    }

    /**
     * @param mixed $ruleSpec
     * @param array $arguments
     *
     * @return Validatable
     */
    public static function buildRule($ruleSpec, $arguments = [])
    {
        try {
            return static::getFactory()->rule($ruleSpec, $arguments);
        } catch (\Exception $exception) {
            throw new ComponentException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return self
     */
    public function __call($method, $arguments)
    {
        return $this->addRule(static::buildRule($method, $arguments));
    }

    protected function createException()
    {
        return new AllOfException();
    }

    /**
     * Create instance validator.
     *
     * @return Validator
     */
    public static function create()
    {
        $ref = new ReflectionClass(__CLASS__);

        return $ref->newInstanceArgs(func_get_args());
    }
}
